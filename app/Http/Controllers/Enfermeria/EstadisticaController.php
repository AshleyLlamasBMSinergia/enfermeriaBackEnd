<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Insumo;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    public function movimientosDelInsumo($id){
        $movimientosDelInsumo = Insumo::find($id)->whereHas('lotes', function ($query) {
            $query->movimientoMovs;
        })->get();

        return $movimientosDelInsumo;
    }
}
