<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Reactivo;
use Illuminate\Http\Request;

class ReactivoController extends Controller
{
    public function index(){
        $data = Reactivo::all();
        return response()->json($data, 200);
    }
}
