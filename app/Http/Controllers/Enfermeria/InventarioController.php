<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Insumo;
use App\Models\Inventario;
use App\Models\Lote;
use App\Models\Profesional;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InventarioController extends Controller
{
    public function index(){
        $data = Inventario::with('insumos')->get();
        return response()->json($data, 200);
    }

    // public function buscador(Request $request){
    //     try{    
    //         $nombre = $request->input('nombre');
    
    //         $historialesMedicos = Inventario::whereHas('pacientable', function($query) use ($nombre) {
    //             $query->where('nombre', 'like', '%' . $nombre . '%');
    //         })->with(['pacientable'])->get();

    //         return response()->json($historialesMedicos);    
    //      }catch(\Exception $e){
    //         return response()->json([
    //             'error' => 'Ocurrió un error: '.$e->getMessage()
    //         ], 500);
    //     }
    // }

    public function inventarioInsumos($id){
        $data = Inventario::with('insumos')->find($id);

        if (!$data) {
            return response()->json(['error' => 'El inventario y sus insumos no fueron encontrados'], 404);
        }

        return response()->json($data, 200);
    }


    public function show($id){
        $data = Inventario::with(['insumos' => function ($query) use ($id) {
            $query->with(['lotes' => function ($query) use ($id) {
                $query->whereHas('inventario', function ($query) use ($id) {
                    $query->where('id', $id);
                });
            }]);
        }])->find($id);

        return response()->json($data, 200);
    }

    public function insumoPorInventario($inventarioId, $insumoId){
        
        $data = Insumo::with(['image', 'reactivos'])->whereHas('inventarios', function($query) use ($inventarioId) {
            $query->where('inventario_id', $inventarioId);
        })->with(['lotes' => function($query) use ($inventarioId) {
            
            // Filtrar los lotes que también tienen una relación con el inventario específico
            $query->whereHas('inventario', function($subQuery) use ($inventarioId) {
                $subQuery->where('inventario_id', $inventarioId);
            });
        }])->find($insumoId);

        if (!$data) {
            return response()->json(['error' => 'El insumo y sus lotes no fueron encontrados'], 404);
        }
        return response()->json($data, 200);
    }
    
    public function lotePorInventario($inventarioId, $loteId){
        
        $data = Lote::with(['insumo', 'insumo.image', 'insumo.reactivos'])->where('inventario_id', $inventarioId)->find($loteId);

        if (!$data) {
            return response()->json(['error' => 'El lote no fué encontrado'], 404);
        }
        return response()->json($data, 200);
    }

    public function addInsumos(Request $request){

        try{
            $inventario = Inventario::find($request['inventario_id']);

            $inventario->insumos()->attach($request['insumo_id']);

            // Responder
            return response()->json([
                'message' => "Insumo agregado al inventario $inventario->nombre exitosamente",
            ]);
            
        }catch(Exception $e){
            Log::error($e);
            return response()->json([
                'error' => 'Ocurrió un error al intentar agregar el insumo'
            ], 500);
        }
    }

    public function inventariosDelProfesional($profesional_id){
        try{
            $profesional = Profesional::find($profesional_id);
    
            if(!$profesional) {
                return response()->json(['message' => 'Profesional no encontrado'], 404);
            }
        
            $inventarios = $profesional->inventarios()->with(['insumos', 'insumos.lotes' => function($query) {
                $query->orderBy('fechaCaducidad', 'asc');
            }])->get();
        
            return response()->json($inventarios, 200);
        }catch(Exception $e){
            Log::error($e);
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }

    public function inventariosDelProfesionalParaConsulta($profesional_id){
        try{
            $profesional = Profesional::find($profesional_id);
    
            if(!$profesional) {
                return response()->json(['message' => 'Profesional no encontrado'], 404);
            }
        
            $inventarios = $profesional->inventarios()->with(['insumos', 'insumos.lotes' => function($query) {
                $query->whereDate('fechaCaducidad', '>', now())
                      ->where('piezasDisponibles', '>', 0)
                      ->orderBy('fechaCaducidad', 'asc');
            }])->whereHas('insumos.lotes', function ($query) {
                $query->where('piezasDisponibles', '>', 1);
                $query->whereDate('fechaCaducidad', '>', now());
            })->get();
            
        
            return response()->json($inventarios, 200);
        }catch(Exception $e){
            Log::error($e);
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }

    // public function inventariosDelProfesional($profesional_id){
    //     try{
    //         $profesional = Profesional::find($profesional_id);
    
    //         if(!$profesional) {
    //             return response()->json(['message' => 'Profesional no encontrado'], 404);
    //         }
        
    //         $inventarios = $profesional->inventarios()->with(['insumos', 'insumos.lotes' => function($query) {
    //             $query->orderBy('fechaCaducidad', 'asc');
    //         }])->get();
        
    //         return response()->json($inventarios, 200);
    //     }catch(Exception $e){
    //         Log::error($e);
    //         return response()->json([
    //             'error' => 'Ocurrió un error: '.$e->getMessage()
    //         ], 500);
    //     }
    // }
}
