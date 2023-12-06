<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\Incapacidad;
use App\Models\NomIncidencia;
use App\Models\NomEmpleado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class IncapacidadController extends Controller
{
    public function index(){
        try{
            $data = Incapacidad::with('empleado', 'tipoIncidencia')->get();
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
            $empleado = NomEmpleado::find($request['empleado_id'])->first();

            $empleadoRH = DB::connection('RecursosHumanosCAN')->table('NomEmpleados')->where('Empleado', $empleado->numero)->first();

            $fecha =  Carbon::parse($request['FechaEfectiva']);

            if(!$request['TipoRiesgo']){
                $request['TipoRiesgo'] = 0;
            }

            if(!$request['Secuela']){
                $request['Secuela'] = 0;
            }

            if(!$request['ControlIncapacidad']){
                $request['ControlIncapacidad'] = 0;
            }

            if(!$request['TipoPermiso']){
                $request['TipoPermiso'] = 0;
            }

            $incapacidad = Incapacidad::create([
                'folio' => $request['Folio'],
                'fechaEfectiva' => $request['FechaEfectiva'],
                'dias' => $request['Dias'],
                'diagnostico' => $request['diagnostico'],
                'TipoIncidencia' => $request['TipoIncidencia'],
                'TipoRiesgo' => $request['TipoRiesgo'],
                'ControlIncapacidad' => $request['ControlIncapacidad'],
                'TipoPermiso' => $request['TipoPermiso'],
                'observaciones' => $request['observaciones'],
                'empleado_id' => $request['empleado_id'],
                'profesional_id' => $request['profesional_id'],
            ]);

            for ($i = 0; $i < $request['Dias']; $i++) {
                NomIncidencia::create([
                    'Empleado' => $empleadoRH->Empleado,
                    'FechaEfectiva' => $fecha->copy()->addDays($i)->startOfDay()->toDateString(),
                    'Sueldo' => $empleadoRH->Sueldo,
                    'Integrado' => $empleadoRH->Integrado,
                    'TipoIncidencia' => $request['TipoIncidencia'],
                    'Incapacidad' => $fecha->year,
                    'Axo' => 0,
                    'Fecha' => $fecha->toDateString(),
                    'Dias' => $request['Dias'],
                    'Importado' => 'S',
                    'TipoRiesgo' => $request['TipoRiesgo'],
                    'Secuela' => $request['Secuela'],
                    'ControlIncapacidad' => $request['ControlIncapacidad'],
                    'Aplicada' => 1,
                    'TipoPermiso' => $request['TipoPermiso'],
                    'incapacidad_id' => $incapacidad->id,
                ]);

                DB::connection('PruebaRecursosHumanosCAN')->table('NomIncidencias')->insert([
                    'Empleado' => $empleadoRH->Empleado,
                    // 'FechaEfectiva' => $fecha->startOfDay(),
                    'FechaEfectiva' => $fecha->copy()->addDays($i)->startOfDay()->toDateString(),
                    'Sueldo' => $empleadoRH->Sueldo,
                    // 'Sueldo' => 0,
                    'Integrado' => $empleadoRH->Integrado,
                    // 'Integrado' => 0,
                    'TipoIncidencia' => $request['TipoIncidencia'],
                    'Incapacidad' => $fecha->year,
                    'Axo' => 0,
                    // 'Fecha' => $fecha->copy()->addDays($i)->toDateString(),
                    'Fecha' => $fecha->toDateString(),
                    'Dias' => $request['Dias'],
                    'Importado' => 'S',
                    'TipoRiesgo' => $request['TipoRiesgo'],
                    'Secuela' => $request['Secuela'],
                    'ControlIncapacidad' => $request['ControlIncapacidad'],
                    'Aplicada' => 1,
                    'TipoPermiso' => $request['TipoPermiso'],
                ]);
            }

            if($request['zonasAfectadas']){
                $incapacidad->zonasAfectadas()->sync($request['zonasAfectadas']);
            }

            return response()->json([
                'message' => 'Incapacidad guardada con éxito',
                'id' => $incapacidad->id
            ], 201);

        }catch(\Exception $e){
            Log::error($e->getTraceAsString());
            return response()->json([
                // 'error' => 'Ocurrió un error al guardar la consulta'
                'error' => $e
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
