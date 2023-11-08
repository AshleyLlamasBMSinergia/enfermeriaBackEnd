<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\Examen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ExamenController extends Controller
{
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

    public function store(Request $request)
    {
        try{
            $examen = Examen::create([
                'fecha' => Carbon::now(),
                'tipo' => $request['tipo'],
                'categoria' => $request['categoria'],
                'descripcion' => $request['descripcion'],
                'historialMedico_id' => $request['historialMedico_id']
            ]);
            
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
                    'archivable_id' => $examen->id,
                    'archivable_type' => Examen::class 
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

    public function destroy($id){
        $examen = Examen::find($id);
    
        if (!$examen) {
            return response()->json([
                'message' => "El examen con ID $id no existe",
            ], 404);
        }else{
            $examen->delete();
        }

        return response()->json([
            'message' => "Examen eliminado exitosamente",
        ]);
    }
}
