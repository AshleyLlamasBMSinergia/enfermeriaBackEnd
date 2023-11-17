<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\ZonaAfectada;
use Illuminate\Http\Request;

class ZonaAfectadaController extends Controller
{
    public function index(){
        $data = ZonaAfectada::all();
        return response()->json($data, 200);
    }
}
