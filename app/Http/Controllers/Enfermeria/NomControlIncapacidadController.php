<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\NomControlIncapacidad;
use Illuminate\Http\Request;

class NomControlIncapacidadController extends Controller
{
    public function index(){
        $data = NomControlIncapacidad::all();
        return response()->json($data, 200);
    }
}
