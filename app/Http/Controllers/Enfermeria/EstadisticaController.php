<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\HistorialMedico;
use App\Models\Insumo;
use App\Models\Inventario;
use App\Models\MovimientoTipo;
use App\Services\HeaderService;
use App\Services\RandomColorService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EstadisticaController extends Controller
{
    protected $randomColorService;
    protected $headerProfesionalCedisService;

    public function __construct(
        RandomColorService $randomColorService,
        HeaderService $headerService
    )
    {
        $this->randomColorService = $randomColorService;
        $this->headerProfesionalCedisService = $headerService->getProfesionalCedisFromHeader();
    }
    
    //Saber que tipo de movimientos de salida se le han dado a los lotes del insumo
    public function salidaDeMovimientosDelInsumo($inventario_id, $insumo_id)
    {
        $insumo = Insumo::find($insumo_id);

        if (!$insumo) {
            return response()->json(['error' => 'Insumo no encontrado'], 404);
        }

        $labels = [];
        $data = [];

        foreach(MovimientoTipo::where('afecta', -1)->get() as $tipoDeMovimiento){

            $count = $insumo->lotes()->where('inventario_id', $inventario_id)->whereHas('movimientoMovs', function ($query) use ($tipoDeMovimiento){
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

        return response()->json([
            'labels' => $labels,
            'data' => $data,
            'backgroundColor' => $backgroundColor,
            'borderColor' => $borderColor
        ], 200);
    }

    public function salidaDeMovimientosDelInsumoTabla($inventario_id, $insumo_id){
        $insumo = Insumo::find($insumo_id);
    
        if (!$insumo) {
            return response()->json(['error' => 'Insumo no encontrado'], 404);
        }

        foreach (MovimientoTipo::where('afecta', -1)->get() as $tipoDeMovimiento) {
            $lotesTipo = $insumo->lotes()
                ->where('inventario_id', $inventario_id)
                ->whereHas('movimientoMovs', function ($query) use ($tipoDeMovimiento) {
                    $query->whereHas('movimientos', function ($query) use ($tipoDeMovimiento) {
                        $query->whereHas('tipoDeMovimiento', function ($query) use ($tipoDeMovimiento){
                            $query->where('clave', $tipoDeMovimiento->clave);
                        });
                    });
                })
                ->count();

            $precioTotal = $insumo->lotes()
                ->where('inventario_id', $inventario_id)
                ->whereHas('movimientoMovs', function ($query) use ($tipoDeMovimiento) {
                    $query->whereHas('movimientos', function ($query) use ($tipoDeMovimiento) {
                        $query->whereHas('tipoDeMovimiento', function ($query) use ($tipoDeMovimiento){
                            $query->where('clave', $tipoDeMovimiento->clave);
                        });
                    });
                })
                ->with(['movimientoMovs' => function ($query) use ($tipoDeMovimiento) {
                    $query->whereHas('movimientos', function ($query) use ($tipoDeMovimiento) {
                        $query->whereHas('tipoDeMovimiento', function ($query) use ($tipoDeMovimiento){
                            $query->where('clave', $tipoDeMovimiento->clave);
                        });
                    });
                }])
                ->get()
                ->flatMap(function ($lote) {
                    return $lote->movimientoMovs->pluck('precio');
                })
                ->sum();

            $data[$tipoDeMovimiento->tipoDeMovimiento] = [
                'lotes' => $lotesTipo,
                'gasto' => $precioTotal,
            ];
        }

        return response()->json($data, 200);

    }

    public function insumosConMasDesechos($inventario_id)
    {
        $inventario = Inventario::find($inventario_id);

        if (!$inventario) {
            return response()->json(['error' => 'Inventario no encontrado'], 404);
        }

        $insumos = $inventario->insumos()
            ->withCount(['lotes as movimientos_tipo_7_count' => function ($query) use ($inventario_id) {
                $query->where('inventario_id', $inventario_id)
                    ->whereHas('movimientoMovs', function ($query) {
                        $query->whereHas('movimientos', function ($query) {
                            $query->whereHas('tipoDeMovimiento', function ($query) {
                                $query->where('clave', 7);
                            });
                        });
                    });
            }])
            ->orderByDesc('movimientos_tipo_7_count')
            ->take(10)
            ->get();

        $backgroundColor = [];

        for ($i = 0; $i < 10; $i++) {
            $backgroundColor[] = $this->randomColorService->randomColor();
        }

        return response()->json([
            'labels' => $insumos->pluck('nombre'),
            'data' => $insumos->pluck('movimientos_tipo_7_count'),
            'backgroundColor' => $backgroundColor,
        ], 200);
    }


    public function insumosConMasDespachosPorReceta($inventario_id, Request $request)
    {
        $inventario = Inventario::find($inventario_id);

        if (!$inventario) {
            return response()->json(['error' => 'Inventario no encontrado'], 404);
        }

        $insumos = $inventario->insumos()
            ->withCount(['lotes as movimientos_tipo_1_count' => function ($query) use ($request) {
                $query
                    ->whereHas('movimientoMovs', function ($query) use ($request) {
                            if($request['fechaInicial'] || $request['fechaFinal']){
                                $query->whereBetween('created_at', [Carbon::parse($request['fechaInicial']), Carbon::parse($request['fechaFinal'])]);
                            }

                            $query->whereHas('movimientos', function ($query) {
                                $query->whereHas('tipoDeMovimiento', function ($query) {
                                    $query->where('clave', 1);
                                });
                            });
                    });
            }])
            ->orderByDesc('movimientos_tipo_1_count')
            ->take(10)
            ->get();

        $backgroundColor = [];
        $borderColor = [];

        for ($i = 0; $i < 10; $i++) {
            $backgroundColor[] = $this->randomColorService->randomColor();
            // $borderColor[] = $this->randomColorService->randomColor();
        }

        return response()->json([
            'labels' => $insumos->pluck('nombre'),
            'data' => $insumos->pluck('movimientos_tipo_1_count'),
            'backgroundColor' => $backgroundColor,
            // 'borderColor' => $borderColor
        ], 200);
    }

    public function pacientesConMasConsultas(){

        $profesionalCedis = $this->headerProfesionalCedisService;

        $historiales = HistorialMedico::whereHas('pacientable', function ($query) use ($profesionalCedis) {
            $query->where('cedi_id', $profesionalCedis->pluck('id'))->whereHas('consultas');
        })->with('pacientable.consultas')->get();
    
        // Obtener el número de consultas por paciente
        $datos = $historiales->map(function ($historial) {
            $paciente = $historial->pacientable;
            $numeroConsultas = $paciente->consultas->count();
            return [
                'nombre' => $paciente->nombre,
                'consultas' => $numeroConsultas,
            ];
        });
    
        // Ordenar los datos por el número de consultas
        $datos = $datos->sortByDesc('consultas')->take(10);
    
        // Obtener los colores de fondo
        $backgroundColor = [];
        for ($i = 0; $i < $datos->count(); $i++) {
            $backgroundColor[] = $this->randomColorService->randomColor();
        }
    
        return response()->json([
            'labels' => $datos->pluck('nombre'),
            'data' => $datos->pluck('consultas'),
            'backgroundColor' => $backgroundColor,
        ], 200);
    }
    
}
