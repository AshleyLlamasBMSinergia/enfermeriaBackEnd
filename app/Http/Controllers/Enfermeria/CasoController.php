<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\Caso;
use App\Models\Departamento;
use App\Models\NomEmpleado;
use App\Models\rh\NomEmpleado as RhNomEmpleado;
use App\Services\HeaderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CasoController extends Controller
{
    protected $headerProfesionalCedisService;

    public function __construct(HeaderService $headerService)
    {
        $this->headerProfesionalCedisService = $headerService->getProfesionalCedisFromHeader();
    }
    public function index(){
        try{
            $profesionalCedis = $this->headerProfesionalCedisService;

            $data = Caso::with('empleado')->whereHas('empleado' ,function ($query) use ($profesionalCedis){
                $query->whereIn('cedi_id', $profesionalCedis->pluck('id'));
            })->get();
            return response()->json($data, 200);
        }catch (\Exception $e){
            return response()->json([
                'error'=> $e->getMessage()
            ]);
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

        } catch (\Exception $e) {
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
}
