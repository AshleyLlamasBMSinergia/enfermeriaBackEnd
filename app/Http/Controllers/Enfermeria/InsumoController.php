<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use App\Models\Insumo;
use App\Models\Inventario;
use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function insumosQueNoTieneInventario($id)
    {
        try{
            $data = Insumo::with('image')->whereDoesntHave('inventarios', function ($query) use ($id) {
                $query->where('inventario_id', $id);
            })->get();

            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error al buscar todos los insumos'
                // 'error' => $e
            ], 500);
        }
    }

    public function show($id){
        try{
            $data = Insumo::with(['image'])->find($id);

            if(!$data){
                return response()->json([
                    'error' => 'No se encontro el insumo'
                ], 400);
            }

            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error al buscar el insumo'
                // 'error' => $e
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $insumo = Insumo::create([
                'nombre' => $request['nombre'],
                'piezasPorLote' => $request['piezasPorLote'],
                'descripcion' => $request['descripcion'],
                'precio' => $request['precio'],
                'inventario_id' => $request['inventario_id']
            ]);

            $insumo->inventarios()->attach($request['inventario_id']);
            $insumo->reactivos()->attach($request['reactivos']);

            if($request['imagen']){
                $imagenBase64 = explode(";base64,",$request['imagen']);
                $imagenExplode = explode("image/", $imagenBase64[0]);
                $imagenFormato = $imagenExplode[1];
                $imagen = base64_decode($imagenBase64[1]);
                $imagenNombre = Str::random(12);
                $ruta = storage_path('app/private/insumos/'.$imagenNombre.'.'.$imagenFormato);

                file_put_contents($ruta, $imagen);
            
                // Guardar la imagen
                $imagen = Imagen::create([
                    'url' => $imagenNombre.'.'.$imagenFormato,
                    'categoria' => 'insumos',
                    'imageable_id' => $insumo->id,
                    'imageable_type' => Insumo::class
                ]);
            }

            // Responder
            return response()->json([
                'message' => 'Insumo guardado exitosamente',
            ]);

        }catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'error' => 'Error al guardar el insumo',
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        try{
            $insumo = Insumo::find($id);

            if (!$insumo) {
                return response()->json([
                    'message' => "El insumo con ID $id no existe",
                ], 404);
            }else{

                foreach($insumo->lotes as $lote){
                    $lote->delete();
                }

                $insumo->delete();
            }
    
            return response()->json([
                'message' => "Insumo eliminado exitosamente",
            ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }
}
