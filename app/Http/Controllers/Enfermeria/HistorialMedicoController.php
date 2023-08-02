<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\HistorialMedico;

class HistorialMedicoController extends Controller
{
    public function index(){
        $data = HistorialMedico::with('pacientable')->get();
        return response()->json($data, 200);
    }

    public function show(HistorialMedico $HistorialMedico){
        $data = HistorialMedico::with(['pacientable', 'pacientable.puesto'])->find($HistorialMedico->HistorialMedico);
        if (!$data) {
            return response()->json(['error' => 'Historial médico no encontrado'], 404);
        }
        return response()->json($data, 200);
    }
}
