<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Pendiente;
use Illuminate\Http\Request;

class PendienteController extends Controller
{
    public function index(){
        $data = Pendiente::all();
        return response()->json($data, 200);
    }
}
