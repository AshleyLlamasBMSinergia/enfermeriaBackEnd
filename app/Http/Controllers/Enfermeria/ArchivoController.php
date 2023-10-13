<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
}
