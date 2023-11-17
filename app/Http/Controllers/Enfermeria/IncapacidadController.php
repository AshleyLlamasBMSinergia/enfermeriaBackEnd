<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\Incapacidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class IncapacidadController extends Controller
{
    public function index(){
        try{
            $data = Incapacidad::with('revisiones', 'revisiones.alta', 'empleado')->get();
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
            $incapacidad = Incapacidad::create($request->all());

            $incapacidad->zonasAfectadas()->sync($request['zonasAfectadas']);

            return response()->json([
                'message' => 'Incapacidad guardada con éxito',
                'id' => $incapacidad->id
            ], 201);

        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                // 'error' => 'Ocurrió un error al guardar la consulta'
                'error' => $e
            ], 500);
        }
    }

    public function show($id){
        $data = Incapacidad::with([
            'empleado',
            'empleado.image',
            'profesional',
            'profesional.image',
            'zonasAfectadas',
            'revisiones',
            'revisiones.alta'
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
                'message' => 'Examen guardado exitosamente',
            ]);

        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }
}
