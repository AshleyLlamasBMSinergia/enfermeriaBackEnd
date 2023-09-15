<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Insumo;
use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InsumoController extends Controller
{
    public function buscador(Request $request){
        try{
            $nombre = $request['nombre'];
    
            $insumos = Insumo::where('nombre', 'like', '%' . $nombre . '%')->get();
    
            return response()->json($insumos);
    
         }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        try{
            $data = Insumo::with(['lotes'])->get();
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json([
                // 'error' => 'Ocurrió un error al buscar todos los insumos'
                'error' => $e
            ], 500);
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id){
        
        $data = Insumo::with(['lotes'])->find($id);

        if (!$data) {
            return response()->json(['error' => 'El insumo y sus lotes no fueron encontrados'], 404);
        }
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
