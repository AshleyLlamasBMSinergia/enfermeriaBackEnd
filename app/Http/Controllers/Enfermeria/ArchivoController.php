<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function archivo($url){

        try{

            $archivo = Archivo::where('url', $url)->first();
    
            if (!$archivo) {
                return response()->json(['error' => 'archivo no encontrado'], 404);
            }
        
            $path = storage_path('app/private/archivos/' . $archivo->url);

            return response()->file($path);

        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'error' => $e
            ], 500);
        }
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

    public function create(Request $request){

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
                    'archivable_id' => $request['archivable_id'],
                    'archivable_type' => $request['archivable_type']
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
