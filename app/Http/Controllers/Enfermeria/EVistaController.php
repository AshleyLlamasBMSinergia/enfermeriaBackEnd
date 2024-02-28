<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\EVista;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EVistaController extends Controller
{
    public function store(Request $request)
    {
        try{
            $EVista = EVista::create([
                'fecha' => Carbon::now(),
                'tipo' => $request['tipo'],
                'necesitaLentes' => $request['necesitaLentes'],
                'usaLentes' => $request['usaLentes'],
                'comentarios' => $request['comentarios'],
                'historialMedico_id' => $request['historialMedico_id']
            ]);

            return response()->json([
                'message' => 'Examen de vista guardado exitosamente',
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
        $EVista = EVista::find($id);

        if (!$EVista) {
            return response()->json([
                'message' => "El examen de vista con ID $id no existe",
            ], 404);
        }else{
            $EVista->delete();
        }

        return response()->json([
            'message' => "Examen de vista eliminado exitosamente",
        ]);
    }
}
