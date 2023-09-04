<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Externo;
use Illuminate\Http\Request;

class ExternoController extends Controller
{
    public function index(){
        $data = Externo::all();
        return response()->json($data, 200);
    }

    public function show($id){
        $data = Externo::find($id);
        return response()->json($data, 200);
    }
}
