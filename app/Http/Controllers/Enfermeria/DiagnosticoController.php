<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Diagnostico;
class DiagnosticoController extends Controller
{
    public function index(){
        $data = Diagnostico::all();
        return response()->json($data, 200);
    }
}
