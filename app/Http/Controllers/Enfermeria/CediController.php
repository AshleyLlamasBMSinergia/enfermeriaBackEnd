<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Cedi;
use App\Models\Profesional;
use Illuminate\Http\Request;

class CediController extends Controller
{
    public function cedisPorProfesional($id){
        $profesional = Profesional::with('cedis.empresa')->find($id);
    
        if (!$profesional) {
            return response()->json(['message' => 'Profesional no encontrado'], 404);
        }
    
        return response()->json($profesional->cedis, 200);
    }
}
