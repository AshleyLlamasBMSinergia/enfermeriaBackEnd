<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function image($url){

        try{
            $imagen = Imagen::where('url', $url)->first();
    
            if (!$imagen) {
                return response()->json(['error' => 'Imagen no encontrada'], 404);
            }
        
            $path = storage_path('app/private/' . $imagen->categoria . '/' . $imagen->url);

            // return response()->download(storage_path('app/private/'.$image->url), null, [], null);

            return response()->file($path);

        }catch(\Exception $e){
            return response()->json([
                'error' => $e
            ], 500);
        }
    } 
}
