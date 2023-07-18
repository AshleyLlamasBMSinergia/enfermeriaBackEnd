<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\HistorialMedico;
use CreateHistorialesMedicosTable;
use Illuminate\Http\Request;

class HistorialMedicoController extends Controller
{
    public function index(){
        $data = HistorialMedico::get();
        return response()->json($data, 200);
    }
}
