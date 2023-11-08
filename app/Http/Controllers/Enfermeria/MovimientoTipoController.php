<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\MovimientoTipo;
use Illuminate\Http\Request;

class MovimientoTipoController extends Controller
{
    public function mandarMovimientosParaLote(){
        $data = MovimientoTipo::where('id', '!=' , 1)->get();
        return response()->json($data, 200);
    }
}
