<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index()
    {
        $data = Cita::with(['paciente', 'profesional', 'paciente.pacientable'])->get();
        return response()->json($data, 200);
    }

    public function citasPorProfesional($profesional_id)
    {
        $data = Cita::where('profesional_id', $profesional_id)->with(['paciente', 'profesional', 'paciente.pacientable'])->get();
        return response()->json($data, 200);
    }
}
