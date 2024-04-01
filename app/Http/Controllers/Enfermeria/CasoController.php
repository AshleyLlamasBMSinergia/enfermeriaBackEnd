<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Caso;
use App\Models\Departamento;
use App\Services\HeaderService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CasoController extends Controller
{
    protected $headerProfesionalCedisService;

    public function __construct(HeaderService $headerService)
    {
        $this->headerProfesionalCedisService = $headerService->getProfesionalCedisFromHeader();
    }
    
    public function index(Request $request)
    {
        try {
            $pageSize = $request->get('pageSize', 10);

            $profesionalCedis = $this->headerProfesionalCedisService;
        
            $data = Caso::with([
                'empleado' => function ($query) {
                    $query->select('id', 'nombre', 'puesto_id');
                },
                'empleado.puesto' => function ($query) {
                    $query->select('id', 'nombre');
                },
                'departamento' => function ($query) {
                    $query->select('id', 'Nombre');
                },
                'incapacidades'          
            ])
            ->whereHas('empleado', function ($query) use ($profesionalCedis) {
                $query->whereIn('cedi_id', $profesionalCedis->pluck('id'));
            });
            
            if ($request->has('caso')) {
                $data = $data->where('id', $request['caso']);
            }

            if ($request->has('empleado')) {
                $data = $data->whereHas('empleado', function ($query) use ($request) {
                    $query->where('nombre', 'like', '%' . $request['empleado'] . '%');
                });
            }

            if ($request->has('puesto')) {
                $data = $data->whereHas('empleado', function ($query) use ($request) {
                    $query->whereHas('puesto', function ($query) use ($request) {
                        $query->where('nombre', 'like', '%' . $request['puesto'] . '%');
                    });
                });
            }

            if ($request->has('departamento')) {
                $data = $data->whereHas('departamento', function ($query) use ($request) {
                    $query->where('nombre', 'like', '%' . $request['departamento'] . '%');
                });
            }

            if ($request->has('fecha')) {
                $data = $data->whereHas('incapacidades', function ($query) use ($request) {
                    $query->whereDate('fechaEfectiva', $request['fecha']);
                });
            }
            
            if ($request->has('estatus')) {
                $data = $data->where('estatus', $request['estatus']);
            }
            
            $data = $data->orderBy('id', 'desc')
            ->paginate($pageSize);

            return response()->json($data, 200);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
    public function store(Request $request, $RHdepartamento_id){
        try {
            $departamento = Departamento::where('Departamento', $RHdepartamento_id)->value('id');

            if (!$departamento) {
                return response()->json(['error' => 'Departamento de RH no encontrado'], 404);
            }

            $caso = Caso::create([
                'departamento_id' => $departamento,
                'empleado_id' => $request['empleado_id'],
                'accidente_id' => null,
                'doctos' => null,
                'estatus' => 'PENDIENTE'
            ]);

            return $caso->id;

        } catch (Exception $e) {
            Log::error($e);
            return response()->json(['error'=> $e->getMessage()]);
        }
    }


    public function show($id){
        $data = Caso::with([
            'departamento',
            'accidente',
            'accidente.accidenteCostEstudios',
            'accidente.diagnostico',
            'empleado',
            'empleado.puesto',
            'empleado.image',
            'empleado.historialMedico',
            'incapacidades.zonasAfectadas',
            'incapacidades.tipoIncidencia',
            'incapacidades.tipoRiesgo',
            'incapacidades.secuela',
            'incapacidades.controlIncapacidad',
            'incapacidades.tipoPermiso',
            'incapacidades.nomIncidencias',
        ])->find($id);

        if (!$data) {
            return response()->json(['error' => 'caso no encontrado'], 404);
        }
        
        $archivosPorCategoria = $data->archivos->groupBy('categoria');
        $data->archivosPorCategoria = $archivosPorCategoria;

        $tieneAltaMedicaST2 = $data->archivos->contains('categoria', 'Alta médica ST2');
        $data->ST2 = $tieneAltaMedicaST2;

        return response()->json($data, 200);
    }

    public function edit($id, Request $request){
        try{
            $caso = Caso::find($id);

            if (!$caso) {
                return response()->json(['error' => 'caso no encontrado'], 404);
            }

            $caso->update([
                'estatus' => $request['estatus'],
                'doctos' => $request['doctos']
            ]);

            return response()->json([
                'message' => 'Caso editado exitosamente',
            ]);

        } catch (Exception $e) {
            Log::error($e);
            return response()->json(['error'=> $e->getMessage()]);
        }
    }
}
