<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\AHeredofamiliar;
use App\Models\HistorialMedico;
use Illuminate\Http\Request;

class AHeredofamiliarController extends Controller
{
    public function show(AHeredofamiliar $antecedentesHeredofamiliares){
        $data = AHeredofamiliar::find($antecedentesHeredofamiliares);
        if (!$data) {
            return response()->json(['error' => 'Antecedentes heredofamiliares no encontrados'], 404);
        }
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        try{
            $antecedentesHeredofamiliares = new AHeredofamiliar();

            $antecedentesHeredofamiliares->padresViven = $request->input('padresViven');
            $antecedentesHeredofamiliares->hermanosViven = $request->input('hermanosViven');
            $antecedentesHeredofamiliares->hermanasViven = $request->input('hermanasViven');

            $antecedentesHeredofamiliares->diabetes = $request->input('diabetes');
            $antecedentesHeredofamiliares->espDiabetes = $request->input('espDiabetes');

            $antecedentesHeredofamiliares->obecidad = $request->input('obecidad');
            $antecedentesHeredofamiliares->espObecidad = $request->input('espObecidad');

            $antecedentesHeredofamiliares->hipertensionArterial = $request->input('hipertensionArterial');
            $antecedentesHeredofamiliares->espHipertensionArterial = $request->input('espHipertensionArterial');

            $antecedentesHeredofamiliares->psoriasisVitiligo = $request->input('psoriasisVitiligo');
            $antecedentesHeredofamiliares->espPsoriasisVitiligo = $request->input('espPsoriasisVitiligo');

            $antecedentesHeredofamiliares->cardiopatias = $request->input('cardiopatias');
            $antecedentesHeredofamiliares->espCardiopatias = $request->input('espCardiopatias');

            $antecedentesHeredofamiliares->lepra = $request->input('lepra');
            $antecedentesHeredofamiliares->espLepra = $request->input('espLepra');

            $antecedentesHeredofamiliares->neoplasicos = $request->input('neoplasicos');
            $antecedentesHeredofamiliares->espNeoplasicos = $request->input('espNeoplasicos');

            $antecedentesHeredofamiliares->fimicos = $request->input('fimicos');
            $antecedentesHeredofamiliares->espFimicos = $request->input('espFimicos');

            $antecedentesHeredofamiliares->tiroideos = $request->input('tiroideos');
            $antecedentesHeredofamiliares->espTiroideos = $request->input('espTiroideos');

            $antecedentesHeredofamiliares->psiquiatricos = $request->input('psiquiatricos');
            $antecedentesHeredofamiliares->espPsiquiatricos = $request->input('espPsiquiatricos');

            $antecedentesHeredofamiliares->alergias = $request->input('alergias');
            $antecedentesHeredofamiliares->espAlergias = $request->input('espAlergias');

            $antecedentesHeredofamiliares->colagenopatias = $request->input('colagenopatias');
            $antecedentesHeredofamiliares->espColagenopatias = $request->input('espColagenopatias');

            $antecedentesHeredofamiliares->probMentales = $request->input('probMentales');
            $antecedentesHeredofamiliares->espProbMentales = $request->input('espProbMentales');

            $antecedentesHeredofamiliares->otros = $request->input('otros');
            $antecedentesHeredofamiliares->save();

            // Obtener la ID del HistorialesMedicos desde el request
            $historialMedicoId = $request->input('historialMedico_id');

            // Buscar el registro de HistorialesMedicos
            $historialMedico = HistorialMedico::find($historialMedicoId);
    
            // Asignar la relación con el AHeredofamiliars
            if ($historialMedico) {
                $historialMedico->AHeredofamiliares_id = $antecedentesHeredofamiliares->id;

                $historialMedico->save();
            }else{
                return response()->json([
                    'error' => 'Historial médico no encontrado'
                ], 500);
            }

            // Responder
            return response()->json([
                'message' => 'Antecedentes heredofamiliares guardados exitosamente',
                // 'antecedentesHeredofamiliares' => $antecedentesHeredofamiliares
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al guardar los antecedentes heredofamiliares'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $antecedentesHeredofamiliares = AHeredofamiliar::find($id);

            if (!$antecedentesHeredofamiliares) {
                return response()->json(['error' => 'Antecedentes heredofamiliares no encontrados'], 404);
            }

            $antecedentesHeredofamiliares->padresViven = $request->input('padresViven');
            $antecedentesHeredofamiliares->hermanosViven = $request->input('hermanosViven');
            $antecedentesHeredofamiliares->hermanasViven = $request->input('hermanasViven');

            $antecedentesHeredofamiliares->diabetes = $request->input('diabetes');
            $antecedentesHeredofamiliares->espDiabetes = $request->input('espDiabetes');

            $antecedentesHeredofamiliares->obecidad = $request->input('obecidad');
            $antecedentesHeredofamiliares->espObecidad = $request->input('espObecidad');

            $antecedentesHeredofamiliares->hipertensionArterial = $request->input('hipertensionArterial');
            $antecedentesHeredofamiliares->espHipertensionArterial = $request->input('espHipertensionArterial');

            $antecedentesHeredofamiliares->psoriasisVitiligo = $request->input('psoriasisVitiligo');
            $antecedentesHeredofamiliares->espPsoriasisVitiligo = $request->input('espPsoriasisVitiligo');

            $antecedentesHeredofamiliares->cardiopatias = $request->input('cardiopatias');
            $antecedentesHeredofamiliares->espCardiopatias = $request->input('espCardiopatias');

            $antecedentesHeredofamiliares->lepra = $request->input('lepra');
            $antecedentesHeredofamiliares->espLepra = $request->input('espLepra');

            $antecedentesHeredofamiliares->neoplasicos = $request->input('neoplasicos');
            $antecedentesHeredofamiliares->espNeoplasicos = $request->input('espNeoplasicos');

            $antecedentesHeredofamiliares->fimicos = $request->input('fimicos');
            $antecedentesHeredofamiliares->espFimicos = $request->input('espFimicos');

            $antecedentesHeredofamiliares->tiroideos = $request->input('tiroideos');
            $antecedentesHeredofamiliares->espTiroideos = $request->input('espTiroideos');

            $antecedentesHeredofamiliares->psiquiatricos = $request->input('psiquiatricos');
            $antecedentesHeredofamiliares->espPsiquiatricos = $request->input('espPsiquiatricos');

            $antecedentesHeredofamiliares->alergias = $request->input('alergias');
            $antecedentesHeredofamiliares->espAlergias = $request->input('espAlergias');

            $antecedentesHeredofamiliares->colagenopatias = $request->input('colagenopatias');
            $antecedentesHeredofamiliares->espColagenopatias = $request->input('espColagenopatias');

            $antecedentesHeredofamiliares->probMentales = $request->input('probMentales');
            $antecedentesHeredofamiliares->espProbMentales = $request->input('espProbMentales');

            $antecedentesHeredofamiliares->otros = $request->input('otros');
            $antecedentesHeredofamiliares->save();
    
            // Responder con éxito
            return response()->json([
                'message' => 'Antecedentes heredofamiliares actualizados exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al actualizar los antecedentes heredofamiliares'
            ], 500);
        }
    }
}
