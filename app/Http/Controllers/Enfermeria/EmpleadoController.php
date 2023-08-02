<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\NomEmpleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index(){
        $data = NomEmpleado::all();
        return response()->json($data, 200);
    }
}
