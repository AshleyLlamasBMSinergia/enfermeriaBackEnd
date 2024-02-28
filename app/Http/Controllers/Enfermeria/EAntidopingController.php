<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\EAntidoping;
use App\Models\EASustancia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EAntidopingController extends Controller
{
    public function store(Request $request)
    {
        try{
            $EAntidoping = EAntidoping::create([
                'fecha' => Carbon::now(),
                'tipo' => $request['tipo'],
                'examen' => $request['examen'],
                'historialMedico_id' => $request['historialMedico_id']
            ]);

            foreach($request['sustancias'] as $sustancia){
                $EASustancia = EASustancia::create([
                    'sustancia' => $sustancia,
                    'resultado' => 'Positivo',
                    'EAntidoping_id' => $EAntidoping->id,
                ]);
            }

            return response()->json([
                'message' => 'Examen antidoping guardado exitosamente',
            ]);

        }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        try{
            $EAntidoping = EAntidoping::find($id);

            if (!$EAntidoping) {
                return response()->json([
                    'message' => "El Examen antidoping con ID $id no existe",
                ], 404);
            }

            // Obtener todas las sustancias asociadas al examen antidoping
            $sustancias = $EAntidoping->sustancias;

            // Iterar sobre las sustancias y eliminarlas
            foreach ($sustancias as $sustancia) {
                $sustancia->delete();
            }

            // Eliminar el examen antidoping
            $EAntidoping->delete();

            return response()->json([
                'message' => "Examen de antidoping eliminado exitosamente",
            ]);
        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'error' => 'Ocurrió un error al eliminar el examen de antidoping'
            ], 500);
        }
    }

}
