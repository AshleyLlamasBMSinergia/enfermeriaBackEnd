<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\APPatologico;
use App\Models\HistorialMedico;
use Illuminate\Http\Request;

class APPatologicoController extends Controller
{
    public function show(APPatologico $antecedentesPersonalesPatologicos){
        $data = APPatologico::find($antecedentesPersonalesPatologicos);
        if (!$data) {
            return response()->json(['error' => 'Antecedentes personales patológicos no encontrado'], 404);
        }
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        try{
            $antecedentesPersonalesPatologicos = new APPatologico();

            $antecedentesPersonalesPatologicos->cirujias = $request->input('cirujias');
            $antecedentesPersonalesPatologicos->espCirujias = $request->input('espCirujias');

            $antecedentesPersonalesPatologicos->contusiones = $request->input('contusiones');
            $antecedentesPersonalesPatologicos->espContusiones = $request->input('espContusiones');

            $antecedentesPersonalesPatologicos->lumbalgias = $request->input('lumbalgias');
            $antecedentesPersonalesPatologicos->espLumbalgias = $request->input('espLumbalgias');

            $antecedentesPersonalesPatologicos->hernias = $request->input('hernias');
            $antecedentesPersonalesPatologicos->espHernias = $request->input('espHernias');

            $antecedentesPersonalesPatologicos->fracturas = $request->input('fracturas');
            $antecedentesPersonalesPatologicos->espFracturas = $request->input('espFracturas');

            $antecedentesPersonalesPatologicos->dorsalgias = $request->input('dorsalgias');
            $antecedentesPersonalesPatologicos->espDorsalgias = $request->input('espDorsalgias');

            $antecedentesPersonalesPatologicos->hospitalizaciones = $request->input('hospitalizaciones');
            $antecedentesPersonalesPatologicos->espHospitalizaciones = $request->input('espHospitalizaciones');

            $antecedentesPersonalesPatologicos->esguinces = $request->input('esguinces');
            $antecedentesPersonalesPatologicos->espEsguinces = $request->input('espEsguinces');

            $antecedentesPersonalesPatologicos->lesionesArteriales = $request->input('lesionesArteriales');
            $antecedentesPersonalesPatologicos->espLesionesArteriales = $request->input('espLesionesArteriales');

            $antecedentesPersonalesPatologicos->transfusiones = $request->input('transfusiones');
            $antecedentesPersonalesPatologicos->espTransfusiones = $request->input('espTransfusiones');

            $antecedentesPersonalesPatologicos->luxaciones = $request->input('luxaciones');
            $antecedentesPersonalesPatologicos->espLuxaciones = $request->input('espLuxaciones');

            $antecedentesPersonalesPatologicos->tetanias = $request->input('tetanias');
            $antecedentesPersonalesPatologicos->espTetanias = $request->input('espTetanias');

            $antecedentesPersonalesPatologicos->alergias = $request->input('alergias');
            $antecedentesPersonalesPatologicos->espAlergias = $request->input('espAlergias');

            $antecedentesPersonalesPatologicos->asma = $request->input('asma');
            $antecedentesPersonalesPatologicos->epilepsia = $request->input('epilepsia');

            $antecedentesPersonalesPatologicos->enfDentales = $request->input('enfDentales');
            $antecedentesPersonalesPatologicos->espEnfDentales = $request->input('espEnfDentales');

            $antecedentesPersonalesPatologicos->enfOpticas = $request->input('enfOpticas');
            $antecedentesPersonalesPatologicos->espEnfOpticas = $request->input('espEnfOpticas');

            $antecedentesPersonalesPatologicos->altPsicologicas = $request->input('altPsicologicas');
            $antecedentesPersonalesPatologicos->espAltPsicologicas = $request->input('espAltPsicologicas');
            $antecedentesPersonalesPatologicos->save();

            // Obtener la ID del HistorialesMedicos desde el request
            $historialMedicoId = $request->input('historialMedico_id');

            // Buscar el registro de HistorialesMedicos
            $historialMedico = HistorialMedico::find($historialMedicoId);
    
            // Asignar la relación con el APPatologicos
            if ($historialMedico) {
                $historialMedico->APPatologicos_id = $antecedentesPersonalesPatologicos->id;

                $historialMedico->save();
            }else{
                return response()->json([
                    'error' => 'Historial médico no encontrado'
                ], 500);
            }

            // Responder
            return response()->json([
                'message' => 'Antecedentes personales patologicos guardados exitosamente',
                // 'antecedentesPersonalesPatologicos' => $antecedentesPersonalesPatologicos
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al guardar los antecedentes personales patológicos del paciente'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $antecedentesPersonalesPatologicos = APPatologico::find($id);

            if (!$antecedentesPersonalesPatologicos) {
                return response()->json(['error' => 'Antecedentes personales patológicos no encontrados'], 404);
            }

            $antecedentesPersonalesPatologicos->cirujias = $request->input('cirujias');
            $antecedentesPersonalesPatologicos->espCirujias = $request->input('espCirujias');

            $antecedentesPersonalesPatologicos->contusiones = $request->input('contusiones');
            $antecedentesPersonalesPatologicos->espContusiones = $request->input('espContusiones');

            $antecedentesPersonalesPatologicos->lumbalgias = $request->input('lumbalgias');
            $antecedentesPersonalesPatologicos->espLumbalgias = $request->input('espLumbalgias');

            $antecedentesPersonalesPatologicos->hernias = $request->input('hernias');
            $antecedentesPersonalesPatologicos->espHernias = $request->input('espHernias');

            $antecedentesPersonalesPatologicos->fracturas = $request->input('fracturas');
            $antecedentesPersonalesPatologicos->espFracturas = $request->input('espFracturas');

            $antecedentesPersonalesPatologicos->dorsalgias = $request->input('dorsalgias');
            $antecedentesPersonalesPatologicos->espDorsalgias = $request->input('espDorsalgias');

            $antecedentesPersonalesPatologicos->hospitalizaciones = $request->input('hospitalizaciones');
            $antecedentesPersonalesPatologicos->espHospitalizaciones = $request->input('espHospitalizaciones');

            $antecedentesPersonalesPatologicos->esguinces = $request->input('esguinces');
            $antecedentesPersonalesPatologicos->espEsguinces = $request->input('espEsguinces');

            $antecedentesPersonalesPatologicos->lesionesArteriales = $request->input('lesionesArteriales');
            $antecedentesPersonalesPatologicos->espLesionesArteriales = $request->input('espLesionesArteriales');

            $antecedentesPersonalesPatologicos->transfusiones = $request->input('transfusiones');
            $antecedentesPersonalesPatologicos->espTransfusiones = $request->input('espTransfusiones');

            $antecedentesPersonalesPatologicos->luxaciones = $request->input('luxaciones');
            $antecedentesPersonalesPatologicos->espLuxaciones = $request->input('espLuxaciones');

            $antecedentesPersonalesPatologicos->tetanias = $request->input('tetanias');
            $antecedentesPersonalesPatologicos->espTetanias = $request->input('espTetanias');

            $antecedentesPersonalesPatologicos->alergias = $request->input('alergias');
            $antecedentesPersonalesPatologicos->espAlergias = $request->input('espAlergias');

            $antecedentesPersonalesPatologicos->asma = $request->input('asma');
            $antecedentesPersonalesPatologicos->epilepsia = $request->input('epilepsia');

            $antecedentesPersonalesPatologicos->enfDentales = $request->input('enfDentales');
            $antecedentesPersonalesPatologicos->espEnfDentales = $request->input('espEnfDentales');

            $antecedentesPersonalesPatologicos->enfOpticas = $request->input('enfOpticas');
            $antecedentesPersonalesPatologicos->espEnfOpticas = $request->input('espEnfOpticas');

            $antecedentesPersonalesPatologicos->altPsicologicas = $request->input('altPsicologicas');
            $antecedentesPersonalesPatologicos->espAltPsicologicas = $request->input('espAltPsicologicas');

            $antecedentesPersonalesPatologicos->save();
    
            // Responder con éxito
            return response()->json([
                'message' => 'Antecedentes personales patológicos actualizados exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al actualizar los antecedentes personales patológicos'
            ], 500);
        }
    }
}
