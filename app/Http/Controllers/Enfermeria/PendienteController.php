<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Pendiente;
use App\Services\HeaderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PendienteController extends Controller
{
    protected $headerProfesionalCedisService, $getProfesionalFromHeader;

    public function __construct(HeaderService $headerService)
    {
        $this->headerProfesionalCedisService = $headerService->getProfesionalCedisFromHeader();
    }
    public function index(){

        $profesionalCedisIds = $this->headerProfesionalCedisService->pluck('id');
    
        $data = Pendiente::with('profesional')->whereHas('profesional', function($query) use ($profesionalCedisIds){
            $query->whereIn('cedi_id', $profesionalCedisIds);
        })->orderBy('fecha', 'asc')->get();
        
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

            $pendiente->fecha = $request['fecha'];
            $pendiente->titulo = $request['titulo'];
            $pendiente->titulo = $request['profesional_id'];

            $pendiente->save();

            return response()->json([
                'message' => 'Pendiente actualizado exitosamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al actualizar el pendiente'
            ], 500);
        }
    }

    public function store(Request $request){

        try{
            $pendiente = Pendiente::create([
                'estatus' => 0,
                'titulo' => $request['titulo'],
                'fecha' => $request['fecha'],
                'profesional_id' => $request['profesional_id'],
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
