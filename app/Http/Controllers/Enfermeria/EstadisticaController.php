<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Insumo;
use App\Models\MovimientoTipo;
use App\Services\RandomColorService;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    protected $randomColorService;

    public function __construct(RandomColorService $randomColorService)
    {
        $this->randomColorService = $randomColorService;
    }
    
    //Saber que tipo de movimientos de salida se le han dado a los lotes del insumo
    public function salidaDeMovimientosDelInsumo($id)
    {
        $insumo = Insumo::find($id);

        if (!$insumo) {
            return response()->json(['error' => 'Insumo no encontrado'], 404);
        }

        $labels = [];
        $data = [];

        foreach(MovimientoTipo::where('afecta', -1)->get() as $tipoDeMovimiento){
            $count = $insumo->lotes()->whereHas('movimientoMovs', function ($query) use ($tipoDeMovimiento){
                $query->whereHas('movimientos', function ($query) use ($tipoDeMovimiento) {
                    $query->whereHas('tipoDeMovimiento', function ($query) use ($tipoDeMovimiento){
                        $query->where('clave', $tipoDeMovimiento->clave);
                    });
                });
            })->count();

            $labels[] = $tipoDeMovimiento->tipoDeMovimiento;
            $data[] = $count;
            $backgroundColor[] = $this->randomColorService->randomColor();
            $borderColor[] = $this->randomColorService->randomColor();
        }

        $datos = [
            'labels' => array_values($labels),
            'data' => array_values($data),
            'backgroundColor' => $backgroundColor,
            'borderColor' => $borderColor
        ];

        dd($datos);

        return response()->json($datos, 200);
    }

}
