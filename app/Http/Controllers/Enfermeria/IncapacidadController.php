<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\Incapacidad;
use App\Models\NomIncidencia;
use App\Models\NomEmpleado;
use App\Services\HeaderService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class IncapacidadController extends Controller
{
    protected $headerProfesionalCedisService;

    public function __construct(HeaderService $headerService)
    {
        $this->headerProfesionalCedisService = $headerService->getProfesionalCedisFromHeader();
    }

    public function index(){
        try{
            $profesionalCedis = $this->headerProfesionalCedisService;

            $data = Incapacidad::with('empleado', 'tipoIncidencia')->whereHas('empleado' ,function ($query) use ($profesionalCedis){
                $query->whereIn('cedi_id', $profesionalCedis->pluck('id'));
            })->get();
            return response()->json($data, 200);
        }catch (\Exception $e){
            return response()->json([
                'error'=> $e->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try{
            $empleado = NomEmpleado::find($request['empleado_id']);

            if (!$empleado) {
                return response()->json([
                    'error' => 'Empleado no encontrado'
                ], 404);
            }

            switch($empleado->cedi->empresa->id){
                case 1: //CAN
                    $BDRecursosHumanos = DB::connection('RecursosHumanosCAN');
                break;
                case 2: //CVN
                    
                break;
                case 5: //ENV
                     
                break;
                case 11: //FCO
                    $BDRecursosHumanos = DB::connection('RecursosHumanosFCO');
                break;
                case 12: //SBM
                    $BDRecursosHumanos = DB::connection('RecursosHumanosSBM');
                break;
                default:
                return response()->json([
                    'error' => 'Empresa del empleado no encontado :('
                ], 404);
            }

            if(!$BDRecursosHumanos){
                Log::error('No se encontro conexión con la base de datos de RH CAN');
                return response()->json([
                    'error' => 'No se encontro conexión con la base de datos de RH CAN'
                ], 404);
            }

            $empleadoRH = $BDRecursosHumanos->table('NomEmpleados')->where('Empleado', $empleado->numero)->first();

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
                'empleado_id' => $request['empleado_id'],
                'profesional_id' => $request['profesional_id'],
            ]);

            for ($i = 0; $i < $request['Dias']; $i++) {

                $existe = NomIncidencia::
                where('Empleado', $empleado->numero)
                ->where('FechaEfectiva', $fecha->copy()->addDays($i)->startOfDay()->toDateString())
                ->count();

                if($existe == 0){

                    $nomIncidenciaInfo = [
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

                    NomIncidencia::create($nomIncidenciaInfo);

                    unset($nomIncidenciaInfo['incapacidad_id']);
    
                    $BDRecursosHumanos->table('NomIncidencias')->insert([
                        $nomIncidenciaInfo
                    ]);

                    if($request['zonasAfectadas']){
                        $incapacidad->zonasAfectadas()->sync($request['zonasAfectadas']);
                    }
                }else{
                    $fechasRepetidas[] = $fecha->copy()->addDays($i)->startOfDay()->toDateString();
                }
            }

            if (!empty($fechasRepetidas)) {
                $incapacidad->delete();

                foreach($incapacidad->nomIncidencias as $incidencia){
                    $incidencia->delete();
                }
            
                return response()->json([
                    'error' => 'Ya existe una incapacidad en la nómina en las fechas: ' . implode(', ', $fechasRepetidas)
                ], 400);
            }else{
                return response()->json([
                    'message' => 'Incapacidad guardada con éxito',
                    'id' => $incapacidad->id
                ], 201);
            }

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
            'empleado',
            'empleado.historialMedico',
            'empleado.image',
            'profesional',
            'profesional.image',
            'zonasAfectadas',
            'tipoIncidencia',
            'tipoRiesgo',
            'secuela',
            'controlIncapacidad',
            'tipoPermiso',
            'nomIncidencias'
        ])->find($id);

        if (!$data) {
            return response()->json(['error' => 'Incapacidad no encontrada'], 404);
        }
        
        $archivosPorCategoria = $data->archivos->groupBy('categoria');
        $data->archivosPorCategoria = $archivosPorCategoria;

        return response()->json($data, 200);
    }

    private function determinarTipoArchivo($base64)
    {
        $data = base64_decode($base64);
        $finfo = finfo_open();
        $mime = finfo_buffer($finfo, $data, FILEINFO_MIME_TYPE);
        finfo_close($finfo);

        $extensions = [
            'image/jpeg' => 'jpeg',
            'image/png' => 'png',
            'application/pdf' => 'pdf',
        ];

        return $extensions[$mime] ?? 'application/octet-stream';
    }

    public function subirArchivos(Request $request){

        try{
            foreach($request['archivos'] as $archivoBase64){
                $archivoDecodificado = base64_decode($archivoBase64);
        
                $tipoArchivo = $this->determinarTipoArchivo($archivoBase64);

                if(!$tipoArchivo){
                    Log::error($tipoArchivo);
                    return response()->json([
                        'error' => 'Problema con la subida de archivos, revise que los archivos cumplan con estos tipos de formato: PNG, JPG y PDF'
                    ], 500);
                }
        
                $nombreArchivo = uniqid().'.'.$tipoArchivo;
        
                Storage::disk('private')->put('/archivos/'.$nombreArchivo, $archivoDecodificado);

                Archivo::create([
                    'url' => $nombreArchivo,
                    'categoria' => $request['categoria'],
                    'archivable_id' => $request['incapacidad_id'],
                    'archivable_type' => Incapacidad::class 
                ]);
            }

            return response()->json([
                'message' => 'Archivo guardado exitosamente',
            ]);

        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }
}
