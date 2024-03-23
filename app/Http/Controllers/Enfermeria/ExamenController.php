<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Archivo;
use App\Models\Examen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ExamenController extends Controller
{
    public function store(Request $request)
    {
        try{
            $examen = Examen::create([
                'fecha' => Carbon::now(),
                'tipo' => $request['tipo'],
                'categoria' => $request['categoria'],
                'descripcion' => $request['descripcion'],
                'historialMedico_id' => $request['historialMedico_id']
            ]);
            
            $request['archivable_id'] = $examen->id;

            $archivoController = new ArchivoController();
            $archivoController->create($request);

            return response()->json([
                'message' => '¡Guardado exitosamente! :)',
            ]);

        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }

    public function destroy($id){
        $examen = Examen::find($id);
    
        if (!$examen) {
            return response()->json([
                'message' => "El examen con ID $id no existe",
            ], 404);
        }else{
            $examen->delete();
        }

        return response()->json([
            'message' => "Examen eliminado exitosamente",
        ]);
    }
}
