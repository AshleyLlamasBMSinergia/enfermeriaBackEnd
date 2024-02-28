<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Profesional;

class ProfesionalController extends Controller
{
    public function index(){
        $data = Profesional::with('horarios')->get();
        return response()->json($data, 200);
    }
}
