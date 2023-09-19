<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\EEmbarazo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EEmbarazoController extends Controller
{
    public function store(Request $request)
    {
        //Log::error($request);
        
        try{
            $EEmbarazo = EEmbarazo::create([
                'fecha' => Carbon::now(),
                'tipo' => $request['tipo'],
                'resultado' => $request['resultado'],
                'comentarios' => $request['comentarios'],
                'historialMedico_id' => $request['historialMedico_id']
            ]);

            return response()->json([
                'message' => 'Examen de embarazo guardado exitosamente',
            ]);

        }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $EEmbarazo = EEmbarazo::find($id);

        if (!$EEmbarazo) {
            return response()->json([
                'message' => "El examen de embarazo con ID $id no existe",
            ], 404);
        }else{
            $EEmbarazo->delete();
        }

        return response()->json([
            'message' => "Examen de embarazo eliminado exitosamente",
        ]);
    }
}
