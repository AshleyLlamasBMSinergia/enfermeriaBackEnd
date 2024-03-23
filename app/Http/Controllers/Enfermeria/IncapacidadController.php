<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\Incapacidad;
use App\Models\NomIncidencia;
use App\Models\NomEmpleado;
use App\Models\User;
use App\Services\DataBaseService;
use App\Services\HeaderService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class IncapacidadController extends Controller
{
    protected $headerService;
    protected $dataBaseService;
    protected $headerUserService;
    protected $headerProfesionalCedisService;

    public function __construct(DataBaseService $dataBaseService, HeaderService $headerService)
    {
        $this->headerService = $headerService;

        $this->dataBaseService = $dataBaseService;
        $this->headerUserService = $headerService->getUserFromHeader();
        $this->headerProfesionalCedisService = $headerService->getProfesionalCedisFromHeader();
    }

    public function store(Request $request)
    {
        try{
            $request['profesional_id'] = $this->headerUserService->id;
            $empleado = NomEmpleado::find($request['empleado_id']);

            if (!$empleado) {
                return response()->json([
                    'error' => 'Empleado no encontrado'
                ], 404);
            }

            $BDRecursosHumanos = $this->dataBaseService->conexionEmpresa($empleado->cedi->empresa_id);

            $empleadoRH = $BDRecursosHumanos->table('NomEmpleados')->where('Empleado', $empleado->numero)->first();

            if (!isset($request['caso_id']) || $request['caso_id'] === NULL) {
                try {
                    $casoController = new CasoController($this->headerService);
                    $casoId = $casoController->store($request, $empleadoRH->Departamento);
                } catch (\Exception $e) {
                    Log::error($e);
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            }else{
                $casoId = $request['caso_id'];
            }    

            $fecha =  Carbon::parse($request['FechaEfectiva']);
                    
            $incapacidad = Incapacidad::create([
                'folio' => $request['Folio'],
                'fechaEfectiva' => $request['FechaEfectiva'],
                'dias' => $request['Dias'],
                'diagnostico' => $request['diagnostico'],
                'TipoIncidencia' => $request['TipoIncidencia'],
                'TipoRiesgo' => $request['TipoRiesgo'] ?? 0,
                'Secuela' => $request['Secuela'] ?? 0,
                'ControlIncapacidad' => $request['ControlIncapacidad'] ?? 0,
                'causa' => $request['causa'],
                'TipoPermiso' => $request['TipoPermiso'] ?? 0,
                'observaciones' => $request['observaciones'],
                'caso_id' => $casoId,
                'profesional_id' => $request['profesional_id'],
            ]);

            for ($i = 0; $i < $request['Dias']; $i++) {

                $existe = NomIncidencia::
                        where('Empleado', $empleado->numero)
                        ->where('FechaEfectiva', $fecha->copy()->addDays($i)->startOfDay()->toDateString())
                        ->exists();

                if(!$existe){
                    $nomIncidenciaInfo[] = [
                        'Empleado' => $empleado->numero,
                        'FechaEfectiva' => $fecha->copy()->addDays($i)->startOfDay()->toDateString(),
                        'Sueldo' => $empleadoRH->Sueldo,
                        'Integrado' => $empleadoRH->Integrado,
                        'TipoIncidencia' => $request['TipoIncidencia'],
                        'Incapacidad' => $fecha->year,
                        'Axo' => 0,
                        'Fecha' => $fecha->toDateString(),
                        'Dias' => $request['Dias'],
                        'Importado' => 'S',
                        'TipoRiesgo' => $request['TipoRiesgo']?? 0,
                        'Secuela' => $request['Secuela']?? 0,
                        'ControlIncapacidad' => $request['ControlIncapacidad']?? 0,
                        'Aplicada' => 1,
                        'TipoPermiso' => $request['TipoPermiso']?? 0,
                        'incapacidad_id' => $incapacidad->id,
                    ];
                }else{
                    $fechasRepetidas[] = $fecha->copy()->addDays($i)->startOfDay()->toDateString();
                    $incapacidad->delete();

                    return response()->json([
                        'error' => 'Ya existe una incapacidad en la nómina en las fechas: ' . implode(', ', $fechasRepetidas)
                    ], 400);
                }
            }

            NomIncidencia::insert($nomIncidenciaInfo);

            if($request['zonasAfectadas']){
                $incapacidad->zonasAfectadas()->sync($request['zonasAfectadas']);
            }

            return response()->json([
                'message' => 'Incapacidad guardada con éxito',
                'id' => $casoId
            ], 201);

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'Ocurrió un error al guardar'
                // 'error' => $e
            ], 500);
        }
    }

    public function show($id){
        $data = Incapacidad::with([
            'profesional',
            'profesional.image',
            'zonasAfectadas',
            'tipoIncidencia',
            'tipoRiesgo',
            'secuela',
            'controlIncapacidad',
            'tipoPermiso',
            'nomIncidencias',
        ])->find($id);

        if (!$data) {
            return response()->json(['error' => 'Incapacidad no encontrada'], 404);
        }
        
        $archivosPorCategoria = $data->archivos->groupBy('categoria');
        $data->archivosPorCategoria = $archivosPorCategoria;

        $tieneAltaMedicaST2 = $data->archivos->contains('categoria', 'Alta médica ST2');
        $data->ST2 = $tieneAltaMedicaST2;

        return response()->json($data, 200);
    }

    public function update($id, Request $request){
        try{
            $incapacidad = Incapacidad::find($id);
            $incapacidad->update(['TipoIncidencia' => $request['TipoIncidencia']]);

            foreach($incapacidad->nomIncidencias as $incidencia){
                $incidencia->update(['TipoIncidencia' => $request['TipoIncidencia']]);
            }            

            return response()->json([
                'message' => 'Incapacidad editada con éxito',
                'id' => $incapacidad->caso->id
            ], 201);

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'Ocurrió un error al guardar'
                // 'error' => $e
            ], 500);
        }
    }

    public function importarRH($id)
    {
        try {
            $incapacidad = Incapacidad::find($id);

            $incidencias = $incapacidad->nomIncidencias->map(function ($item) {
                return [
                    'Aplicada' => $item['Aplicada'],
                    'Axo' => $item['Axo'],
                    'ControlIncapacidad' => $item['ControlIncapacidad'],
                    'Dias' => $item['Dias'],
                    'Empleado' => $item['Empleado'],
                    'Fecha' => $item['Fecha'],
                    'FechaEfectiva' => $item['FechaEfectiva'],
                    'Importado' => $item['Importado'],
                    'Incapacidad' => $item['Incapacidad'],
                    'Integrado' => $item['Integrado'],
                    'Secuela' => $item['Secuela'],
                    'Sueldo' => $item['Sueldo'],
                    'TipoIncidencia' => $item['TipoIncidencia'],
                    'TipoPermiso' => $item['TipoPermiso'],
                    'TipoRiesgo' => $item['TipoRiesgo']
                ];
            })->toArray();

            $BDRecursosHumanos = $this->dataBaseService->conexionEmpresa($incapacidad->caso->empleado->cedi->empresa_id);
            
            if (!$BDRecursosHumanos) {
                throw new \Exception('No se encontró conexión con la base de datos de RH');
            }

            $BDRecursosHumanos->table('NomIncidencias')->insert($incidencias);

            $incapacidad->nomIncidencias()->update(['exportado' => true]);

            return response()->json([
                'message' => 'Incidencias exportadas a la nómina con éxito',
                'id' => $incapacidad->caso->id
            ], 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'Ocurrió un error al exportar'
            ], 500);
        }
    }

    
}
