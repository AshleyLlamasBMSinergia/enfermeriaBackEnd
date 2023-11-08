<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Insumo;
use App\Models\Lote;
use App\Models\Movimiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoteController extends Controller
{
    public function buscador(Request $request){
        try{
            $lote = $request['lote'];
    
            $lotes = Lote::where('lote', 'like', '%' . $lote . '%')->get();
    
            return response()->json($lotes);
    
         }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try{

            $lote = Lote::create([
                'lote' => $request['lote'],
                'fechaCaducidad' => $request['fechaCaducidad'],
                'fechaIngreso' => Carbon::now(),
                'piezasDisponibles' => $request['piezasDisponibles'],
                'insumo_id' => $request['insumo_id'],
                'inventario_id' => $request['inventario_id'],
            ]);


            // Responder
            return response()->json([
                'message' => 'Lote guardado exitosamente',
            ]);

        }catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'error' => 'Error al guardar el lote',
            ], 500);
        }
    }

    public function index()
    {
        try{
            $data = Lote::all();
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json([
                // 'error' => 'Ocurrió un error al buscar todos los lotes del lote'
                'error' => $e
            ], 500);
        }
    }

    public function show($id)
    {
        $data = Lote::with(
            [
                'insumo',
                'insumo.image',
                'movimientos',
                'movimientos.tipoDeMovimiento',
                'movimientos.movimientoMovs',
            ])->find($id);

        if (!$data) {
            return response()->json(['error' => 'Lote no encontrado'], 404);
        }
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        try{
            $lote = Lote::find($id);

            if (!$lote) {
                return response()->json([
                    'message' => "El lote con ID $id no existe",
                ], 404);
            }else{
                $lote->delete();
            }
    
            return response()->json([
                'message' => "Lote eliminado exitosamente",
            ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }
}
