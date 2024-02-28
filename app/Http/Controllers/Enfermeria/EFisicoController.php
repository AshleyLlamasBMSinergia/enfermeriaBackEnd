<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\EAbdomen;
use App\Models\ECabeza;
use App\Models\EColumnaVertebral;
use App\Models\EExtremidad;
use App\Models\EFisico;
use App\Models\EOrganoSentido;
use App\Models\ETorax;
use Illuminate\Http\Request;

class EFisicoController extends Controller
{
    
    public function store(Request $request)
    {
        // Log::error($request);

        try{

            $EColumnaVertebral = EColumnaVertebral::create([
                'lordosis' => $request['lordosis'],
                'flexion' => $request['flexion'],
                'lateralizacion' => $request['lateralizacion'],
                'puntosDolor' => $request['puntosDolor'],
                'xifosis' => $request['xifosis'],
                'extension' => $request['extension'],
                'rotacion' => $request['rotacion'],
                'otros' => $request['otros'],
                'observaciones' => $request['CVobservaciones'],
            ]);

            $EExtremidad = EExtremidad::create([
                'toraxicas' => $request['toraxicas'],
                'hombro' => $request['hombro'],
                'codo' => $request['codo'],
                'muneca' => $request['muneca'],
                'pie' => $request['pie'],
                'movilidad' => $request['movilidad'],
                'pelvicas' => $request['pelvicas'],
                'cadera' => $request['cadera'],
                'rodilla' => $request['rodilla'],
                'tobillo' => $request['tobillo'],
                'mano' => $request['mano'],
                'fuerza' => $request['fuerza'],
                'observaciones' => $request['Eobservaciones'],
            ]);

            $EAbdomen = EAbdomen::create([
                'pared' => $request['pared'],
                'peristalsis' => $request['peristalsis'],
                'visceromegalias' => $request['visceromegalias'],
                'hernias' => $request['hernias'],
                'observaciones' => $request['Aobservaciones'],
            ]);

            $ETorax = ETorax::create([
                'camposPulmonares' => $request['camposPulmonares'],
                'ampAmplex' => $request['ampAmplex'],
                'ruidoPulmonar' => $request['ruidoPulmonar'],
                'transVoz' => $request['transVoz'],
                'areaPrecordial' => $request['areaPrecordial'],
                'FC' => $request['FC'],
                'tono' => $request['tono'],
                'ritmo' => $request['ritmo'],
                'observaciones' => $request['Tobservaciones'],
            ]);

            $ECabeza = ECabeza::create([
                'craneo' => $request['craneo'],
                'ojos' => $request['ojos'],
                'nariz' => $request['nariz'],
                'boca' => $request['boca'],
                'cuello' => $request['cuello'],
                'observaciones' => $request['Eobservaciones'],
            ]);

            $EOrganoSentido = EOrganoSentido::create([
                'vista' => $request['vista'],
                'oido' => $request['oido'],
                'olfato' => $request['olfato'],
                'tacto' => $request['tacto'],
                'observaciones' => $request['OSobservaciones'],
            ]);

            $EFisico = EFisico::create([
                'fecha' => now(),
                'TA' => $request['TA'],
                'FR' => $request['FR'],
                'peso' => $request['peso'],
                'TC' => $request['TC'],
                'temperatura' => $request['temperatura'],
                'talla' => $request['talla'],
                'estadoConciencia' => $request['estadoConciencia'],
                'coordinacion' => $request['coordinacion'],
                'equilibrio' => $request['equilibrio'],
                'marcha' => $request['marcha'],
                'orientacion' => $request['orientacion'],
                'orientacionTiempo' => $request['orientacionTiempo'],
                'orientacionPersona' => $request['orientacionPersona'],
                'orientacionEspacio' => $request['orientacionEspacio'],
                'EOrganoSentido_id' => $EOrganoSentido->id,
                'ECabeza_id' => $ECabeza->id,
                'ETorax_id' => $ETorax->id,
                'EAbdomen_id' => $EAbdomen->id,
                'EExtremidad_id' => $EExtremidad->id,
                'EColumnaVertebral_id' => $EColumnaVertebral->id,
                'historialMedico_id' => $request['historialMedico_id']
            ]);

            return response()->json([
                'message' => 'Exámenes médicos guardados exitosamente',
            ]);

        }catch(\Exception $e){
            return response()->json([
                'error' => 'Ocurrió un error: '.$e->getMessage()
            ], 500);
        }
    }

    public function destroy($id){

        $EFisico = EFisico::find($id);

        if (!$EFisico) {
            return response()->json([
                'message' => "El Examen Físico con ID $id no existe",
            ], 404);
        }

        $EFisico->organoSentido->delete();
        $EFisico->cabeza->delete();
        $EFisico->torax->delete();
        $EFisico->abdomen->delete();
        $EFisico->extremidad->delete();
        $EFisico->columnaVertebral->delete();

        $EFisico->delete();

        return response()->json([
            'message' => "Exámenes físicos eliminados  exitosamente",
        ]);
    }
}
