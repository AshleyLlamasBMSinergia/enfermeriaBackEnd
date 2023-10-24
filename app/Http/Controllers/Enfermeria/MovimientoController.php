<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Insumo;
use App\Models\Inventario;
use App\Models\Lote;
use App\Models\Movimiento;
use App\Models\Salida;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovimientoController extends Controller
{
    public function store(Request $request)
    {
        try{
            $lote = Lote::find($request['lote_id']);

            if (!$lote) {
                return response()->json(['error' => 'El lote no fue encontrado'], 404);
            }

            switch($request['tipo']){
                case 'Salida completa del lote':
                    $this->retirarPiezas($lote->piezasDisponibles, $lote, $request);
                return response()->json([
                    'message' => 'Se descontó el lote del inventario exitosamente',
                ]);
                case 'Salida de piezas':
                    $this->retirarPiezas($request['piezasDescontables'], $lote, $request);

                return response()->json([
                    'message' => 'Se descontaron '.$request['piezasDescontables'].' piezas del inventario exitosamente',
                ]);
                case 'Cambiar de inventario':

                    $inventario = Inventario::find($request['inventario_id']);
                    $inventarioInsumo = $inventario->insumos->where('nombre', $lote->nombre)->first();

                    if($inventarioInsumo){
                
                        $salida = Salida::create([
                            'motivo' => $request['motivo'],
                            'detalles' => $request['detalles'],
                            'inventario_id' => $lote->insumo->inventario->id
                        ]);

                        $entrada = Entrada::create([
                            'motivo' => $request['motivo'],
                            'detalles' => $request['detalles'],
                            'inventario_id' => $request['inventario_id']
                        ]);

                        $lote->update([
                            'insumo_id' => $inventarioInsumo->id
                        ]);
                
                        Movimiento::create([
                            'tipo' => $request['tipo'],
                            'folio' => $request['folio'],
                            'fecha' => Carbon::now(),
                            'profesional_id' => $request['profesional_id'],
                            'lote_id' => $lote->id,
                            'typable_id' => $salida->id,
                            'typable_type' => Salida::class,
                        ]);

                        Movimiento::create([
                            'tipo' => $request['tipo'],
                            'folio' => $request['folio'],
                            'fecha' => Carbon::now(),
                            'profesional_id' => $request['profesional_id'],
                            'lote_id' => $lote->id,
                            'typable_id' => $entrada->id,
                            'typable_type' => Entrada::class,
                        ]);
                    }else{

                        $inventarioInsumo = Insumo::create([
                            'nombre' => $lote->insumo->nombre,
                            'piezasPorLote' => $lote->insumo->piezasPorLote,
                            'descripcion' => $lote->insumo->descripcion,
                            'precio' => $lote->insumo->precio,
                            'inventario_id' => $request['inventario_id']
                        ]);

                        $salida = Salida::create([
                            'motivo' => $request['motivo'],
                            'detalles' => $request['detalles'],
                            'inventario_id' => $lote->insumo->inventario->id
                        ]);

                        $entrada = Entrada::create([
                            'motivo' => $request['motivo'],
                            'detalles' => $request['detalles'],
                            'inventario_id' => $request['inventario_id']
                        ]);

                        $lote->update([
                            'insumo_id' => $inventarioInsumo->id
                        ]);
                
                        Movimiento::create([
                            'tipo' => $request['tipo'],
                            'folio' => $request['folio'],
                            'fecha' => Carbon::now(),
                            'profesional_id' => $request['profesional_id'],
                            'lote_id' => $lote->id,
                            'typable_id' => $salida->id,
                            'typable_type' => Salida::class,
                        ]);

                        Movimiento::create([
                            'tipo' => $request['tipo'],
                            'folio' => $request['folio'],
                            'fecha' => Carbon::now(),
                            'profesional_id' => $request['profesional_id'],
                            'lote_id' => $lote->id,
                            'typable_id' => $entrada->id,
                            'typable_type' => Entrada::class,
                        ]);
                    }

                break;
            }

            return response()->json([
                'message' => 'Movimiento guardado exitosamente',
            ]);

        }catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'error' => 'Error al guardar movimiento',
            ], 500);
        }
    }

    public function retirarDesdeConsulta(Request $request){
        
    }

    public function retirarPiezas($piezasDescontables, Lote $lote, Request $request){
        $lote->update([
            'piezasDisponibles' => $lote->piezasDisponibles - $piezasDescontables
        ]);

        $salida = Salida::create([
            'motivo' => $request['motivo'],
            'detalles' => $request['detalles'],
            'inventario_id' => $lote->insumo->inventario->id
        ]);

        Movimiento::create([
            'tipo' => $request['tipo'],
            'folio' => $request['folio'],
            'fecha' => Carbon::now(),
            'profesional_id' => $request['profesional_id'],
            'lote_id' => $lote->id,
            'typable_id' => $salida->id,
            'typable_type' => Salida::class,
        ]);
    }
}
