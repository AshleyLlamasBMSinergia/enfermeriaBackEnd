<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Pendiente;
use Illuminate\Http\Request;

class PendienteController extends Controller
{
    public function index(){
        $data = Pendiente::all();
        return response()->json($data, 200);
    }

    public function updateEstatus(Request $request, $id){
        
        try{
            $pendiente = Pendiente::find($id);

            if (!$pendiente) {
                return response()->json(['error' => 'Pendiente no econtrado'], 404);
            }

            $pendiente->estatus = $request->input('estatus');
            $pendiente->save();

            // return response()->json([
            //     'message' => 'Estado del pendiente actualizado exitosamente'
            // ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al actualizar el estado del pendiente'
            ], 500);
        }
    }

    public function updateTitulo(Request $request, $id){
        
        try{
            $pendiente = Pendiente::find($id);

            if (!$pendiente) {
                return response()->json(['error' => 'Pendiente no econtrado'], 404);
            }

            $pendiente->titulo = $request['titulo'];
            $pendiente->save();

            return response()->json([
                'message' => 'Título del pendiente actualizado exitosamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al actualizar el título del pendiente'
            ], 500);
        }
    }

    public function store(Request $request){

        try{
            $pendiente = Pendiente::create([
                'estatus' => 0,
                'titulo' => $request['titulo']
            ]);

            return response()->json([
                'message' => 'Pendiente guardado exitosamente'
            ]);

        }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error al crear el pendiente'
            ], 500);
        }
    }

    public function destroy($id){
        try{
            $pendiente = Pendiente::find($id);

            if (!$pendiente) {
                return response()->json(['error' => 'Pendiente no econtrado'], 404);
            }

            $pendiente->delete();

            return response()->json([
                'message' => 'Pendiente eliminado exitosamente'
            ]);

        }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error al eliminar el pendiente'
            ], 500);
        }
    }
}
