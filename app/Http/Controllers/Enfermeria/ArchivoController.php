<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function image($url){

        try{
            $archivo = Archivo::where('url', $url)->first();
    
            if (!$archivo) {
                return response()->json(['error' => 'archivo no encontrado'], 404);
            }
        
            $path = storage_path('app/private/archivo/' . $archivo->categoria . '/' . $archivo->url);

            return response()->file($path);

        }catch(\Exception $e){
            return response()->json([
                'error' => $e
            ], 500);
        }
    } 
}
