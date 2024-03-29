<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enfermeria\ExamenController;
use App\Models\Archivo;
use App\Models\Lote;
use App\Models\Movimiento;
use App\Models\MovimientoMov;
use App\Models\MovimientoTipo;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MovimientoController extends Controller
{
    public function pdfs(Request $request){

        $movimientos = Movimiento::
        with
        (
            'profesional',
            // 'profesional.image',
            'tipoDeMovimiento',
            'inventario',
            'movimientoMovs',
            'movimientoMovs.lote',
            'movimientoMovs.lote.insumo'
        )
        ->where('inventario_id', $request['inventario_id'])
        ->whereDate('fecha', '>=', $request['fechaInicial'])
        ->whereDate('fecha', '<=', $request['fechaFinal'])
        ->whereHas('tipoDeMovimiento', function($query) use ($request) {
            $query->where('clave', $request['clave']);
        })
        ->get();

        if(!$movimientos){
            return response()->json(['error' => 'No se econtro ningún movimiento'], 404);
        }

        $movimientosAgrupados = [];

        foreach ($movimientos as $movimiento) {
            $gruposMovimientos = [];
        
            foreach ($movimiento->movimientoMovs as $mov) {
                $nombreInsumo = $mov->lote->insumo->nombre;
        
                if (!isset($gruposMovimientos[$nombreInsumo])) {
                    $gruposMovimientos[$nombreInsumo] = [];
                }
        
                $gruposMovimientos[$nombreInsumo][] = $mov;
            }
        
            $movimientosAgrupados[$movimiento->id] = [
                'movimiento' => $movimiento,
                'insumos' => $gruposMovimientos,
            ];
        }

        $pdf = Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])->loadView('pdfs.movimientos', [
            'movimientos' => $movimientosAgrupados,
        ]);

        return $pdf->stream('movimientos.pdf');
    }  

    public function movimientosPorInventario($inventario_id){
        $data = Movimiento::with(['profesional', 'tipoDeMovimiento'])->where("inventario_id", $inventario_id)->get();

        if(!$data){
            return response()->json(['error' => 'Los movimientos del inventario no fueron encontrados'], 404);
        }

        return response()->json($data, 200);
    }

    public function show($id){

        $data = Movimiento::with([
            'archivos',
            'profesional',
            'profesional.image',
            'tipoDeMovimiento',
            'inventario',
            'movimientoMovs',
            'movimientoMovs.lote',
            'movimientoMovs.lote.insumo'
        ])->find($id);
    
        if (!$data) {
            return response()->json(['error' => 'Reporte de movimiento no encontrado'], 404);
        }
    
        $archivosPorCategoria = $data->archivos->groupBy('categoria');
        $data->archivosPorCategoria = $archivosPorCategoria;

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        try{
            $movimientoTipo = MovimientoTipo::find($request['movimientoTipo_id']);

            $movimiento = Movimiento::create([
                'fecha' => Carbon::now(),
                'profesional_id' => $request['profesional_id'],
                'inventario_id' => $request['inventario_id'],
                'movimientoTipo_id' => $request['movimientoTipo_id'],
            ]);

            if($request->formInsumos){
                foreach ($request->formInsumos['itemInsumo'] as $i => $requestInsumo) {
                    foreach($requestInsumo['lotes'] as $requestLote){

                        if($request['movimientoTipo_id'] == 3 || $request['movimientoTipo_id'] >= 11 && $request['movimientoTipo_id'] <= 14)
                        {

                            $lote = Lote::where('lote', $requestLote['lote'])->where('inventario_id', $request['inventario_id'])->first();

                            if(!$lote){
                                //COMPRA - ENTRADA
                                $lote = Lote::create([ //Crear lote y reescribir $lote
                                    'lote' => $requestLote['lote'],
                                    'fechaCaducidad' => $requestLote['fechaCaducidad'],
                                    'fechaIngreso' => Carbon::now(),
                                    'piezasDisponibles' => $requestLote['cantidad'],
                                    'inventario_id' => $request['inventario_id'],
                                    'insumo_id' => $requestInsumo['id'],
                                ]);
                            }else{
                                $this->calculo($lote, ($movimientoTipo->afecta * $requestLote['cantidad']));
                            }

                        }else{
                            //SALIDA
                            $lote = Lote::find($requestLote['lote']);

                            $this->calculo($lote, ($movimientoTipo->afecta * $requestLote['cantidad']));
                        }

                        MovimientoMov::create([
                            'lote_id' => $lote->id,
                            'unidades' => $requestLote['cantidad'],
                            'movimiento_id' => $movimiento->id,
                            'precio' => ($requestInsumo['precio']/$requestInsumo['piezasPorLote'])*$requestLote['cantidad'],
                        ]);
                    }
                }
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

    //Sumar o restar piezas
    public function calculo(Lote $lote, $piezas){

        try{
            $lote->update([
                'piezasDisponibles' => $lote->piezasDisponibles + ($piezas),
            ]);
        }catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'error'=> 'Error al descontar las piezas del lote: '.$lote->lote,
            ]);
        }
    }
}
