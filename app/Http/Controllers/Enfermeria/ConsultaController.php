<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Consulta;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index(){
        $data = Consulta::get();
        return response()->json($data, 200);
    }
}
