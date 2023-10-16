<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Inventario;
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

    public function show($id){
        
        $data = Inventario::with('insumos', 'insumos.lotes')->find($id);

        if (!$data) {
            return response()->json(['error' => 'El inventario, insumos y sus lotes no fueron encontrados'], 404);
        }
        return response()->json($data, 200);
    }
}
