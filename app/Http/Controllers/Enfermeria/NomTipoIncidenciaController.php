<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\NomTipoIncidencia;
use Illuminate\Http\Request;

class NomTipoIncidenciaController extends Controller
{
    public function index(){
        $data = NomTipoIncidencia::where('Tipo', 'I')->orWhere('TipoIncidencia', 'PG')->orWhere('TipoIncidencia', 'PP')->get();
        return response()->json($data, 200);
    }
}
