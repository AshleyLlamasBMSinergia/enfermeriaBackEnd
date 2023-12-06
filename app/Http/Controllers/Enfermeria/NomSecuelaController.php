<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\NomSecuela;
use Illuminate\Http\Request;

class NomSecuelaController extends Controller
{
    public function index(){
        $data = NomSecuela::all();
        return response()->json($data, 200);
    }
}
