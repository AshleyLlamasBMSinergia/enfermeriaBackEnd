<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function image($url){
        $imagen = Imagen::where('url', $url)->first();
    
        if (!$imagen) {
            return response()->json(['error' => 'Imagen no encontrada'], 404);
        }
    
        $path = storage_path('app/private/' . $imagen->categoria . '/' . $imagen->url);
    
        // return response()->download($path, null, [], null);

        return response()->file($path);
    } 
}
