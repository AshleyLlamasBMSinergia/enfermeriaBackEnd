<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\NomTipoPermiso;
use Illuminate\Http\Request;

class NomTipoPermisoController extends Controller
{
    public function index(){
        $data = NomTipoPermiso::all();
        return response()->json($data, 200);
    }
}
