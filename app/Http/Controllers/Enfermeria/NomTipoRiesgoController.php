<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\NomTipoRiesgo;
use Illuminate\Http\Request;

class NomTipoRiesgoController extends Controller
{
    public function index(){
        $data = NomTipoRiesgo::all();
        return response()->json($data, 200);
    }
}
