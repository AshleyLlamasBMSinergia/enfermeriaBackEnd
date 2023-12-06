<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\NomEstado;
use Illuminate\Http\Request;

class NomEstadoController extends Controller
{
    public function index(){
        $data = NomEstado::with('localidades')->get();
        return response()->json($data, 200);
    }
}
