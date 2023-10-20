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
            ]);

            $inventarioId = Insumo::find($request['insumo_id'])->inventario->id;

            if(!$inventarioId){
                return response()->json([
                    'message' => "Inventario no encontrado",
                ], 404);
            }

            $entrada = Entrada::create([
                'motivo' => $request['motivo'],
                'detalles' => $request['detalles'],
                'inventario_id' => $inventarioId
            ]);

            Movimiento::create([
                'tipo' => 'Entrada al inventario',
                'folio' => $request['folio'],
                'fecha' => Carbon::now(),
                'profesional_id' => $request['profesional_id'],
                'lote_id' => $lote->id,
                'typable_id' => $entrada->id,
                'typable_type' => Entrada::class,
            ]);

            // Log::error($request);

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
                'movimientos.typable',
                // 'insumo.inventario',
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
