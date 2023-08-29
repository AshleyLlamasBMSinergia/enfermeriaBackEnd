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
            return response()->json(['error' => 'Historial médico no encontrado'], 404);
        }
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $antecedentesPersonalesPatologicos = new APPatologico();

        $antecedentesPersonalesPatologicos->Cirujias = $request->input('Cirujias');
        $antecedentesPersonalesPatologicos->EspCirujias = $request->input('EspCirujias');

        $antecedentesPersonalesPatologicos->Contusiones = $request->input('Contusiones');
        $antecedentesPersonalesPatologicos->EspContusiones = $request->input('EspContusiones');

        $antecedentesPersonalesPatologicos->Lumbalgias = $request->input('Lumbalgias');
        $antecedentesPersonalesPatologicos->EspLumbalgias = $request->input('EspLumbalgias');

        $antecedentesPersonalesPatologicos->Hernias = $request->input('Hernias');
        $antecedentesPersonalesPatologicos->EspHernias = $request->input('EspHernias');

        $antecedentesPersonalesPatologicos->Fracturas = $request->input('Fracturas');
        $antecedentesPersonalesPatologicos->EspFracturas = $request->input('EspFracturas');

        $antecedentesPersonalesPatologicos->Dorsalgias = $request->input('Dorsalgias');
        $antecedentesPersonalesPatologicos->EspDorsalgias = $request->input('EspDorsalgias');

        $antecedentesPersonalesPatologicos->Hospitalizaciones = $request->input('Hospitalizaciones');
        $antecedentesPersonalesPatologicos->EspHospitalizaciones = $request->input('EspHospitalizaciones');

        $antecedentesPersonalesPatologicos->Esguinces = $request->input('Esguinces');
        $antecedentesPersonalesPatologicos->EspEsguinces = $request->input('EspEsguinces');

        $antecedentesPersonalesPatologicos->LesionesArteriales = $request->input('LesionesArteriales');
        $antecedentesPersonalesPatologicos->EspLesionesArteriales = $request->input('EspLesionesArteriales');

        $antecedentesPersonalesPatologicos->Transfusiones = $request->input('Transfusiones');
        $antecedentesPersonalesPatologicos->EspTransfusiones = $request->input('EspTransfusiones');

        $antecedentesPersonalesPatologicos->Luxaciones = $request->input('Luxaciones');
        $antecedentesPersonalesPatologicos->EspLuxaciones = $request->input('EspLuxaciones');

        $antecedentesPersonalesPatologicos->Tetanias = $request->input('Tetanias');
        $antecedentesPersonalesPatologicos->EspTetanias = $request->input('EspTetanias');

        $antecedentesPersonalesPatologicos->Alergias = $request->input('Alergias');
        $antecedentesPersonalesPatologicos->EspAlergias = $request->input('EspAlergias');

        $antecedentesPersonalesPatologicos->Asma = $request->input('Asma');
        $antecedentesPersonalesPatologicos->Epilepsia = $request->input('Epilepsia');

        $antecedentesPersonalesPatologicos->EnfDentales = $request->input('EnfDentales');
        $antecedentesPersonalesPatologicos->EspEnfDentales = $request->input('EspEnfDentales');

        $antecedentesPersonalesPatologicos->EnfOpticas = $request->input('EnfOpticas');
        $antecedentesPersonalesPatologicos->EspEnfOpticas = $request->input('EspEnfOpticas');

        $antecedentesPersonalesPatologicos->AltPsicologicas = $request->input('AltPsicologicas');
        $antecedentesPersonalesPatologicos->EspAltPsicologicas = $request->input('EspAltPsicologicas');

        $antecedentesPersonalesPatologicos->save();

         // Obtener la ID del HistorialesMedicos desde el request
         $historialMedicoId = $request->input('HistorialMedico');

         // Buscar el registro de HistorialesMedicos
         $historialMedico = HistorialMedico::find($historialMedicoId);
 
         // Asignar la relación con el APPatologicos
        if ($historialMedico) {
            $historialMedico->antecedentesPersonalesPatologicos()->associate($antecedentesPersonalesPatologicos);
            $historialMedico->save();
        }

        // Responder
        return response()->json([
            'message' => 'Antecedentes personales patologicos guardados exitosamente',
            // 'antecedentesPersonalesPatologicos' => $antecedentesPersonalesPatologicos
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $antecedentesPersonalesPatologicos = APPatologico::find($id);

            if (!$antecedentesPersonalesPatologicos) {
                return response()->json(['error' => 'Antecedentes personales patológicos no encontrados'], 404);
            }

            $antecedentesPersonalesPatologicos->Cirujias = $request->input('Cirujias');
            $antecedentesPersonalesPatologicos->EspCirujias = $request->input('EspCirujias');

            $antecedentesPersonalesPatologicos->Contusiones = $request->input('Contusiones');
            $antecedentesPersonalesPatologicos->EspContusiones = $request->input('EspContusiones');

            $antecedentesPersonalesPatologicos->Lumbalgias = $request->input('Lumbalgias');
            $antecedentesPersonalesPatologicos->EspLumbalgias = $request->input('EspLumbalgias');

            $antecedentesPersonalesPatologicos->Hernias = $request->input('Hernias');
            $antecedentesPersonalesPatologicos->EspHernias = $request->input('EspHernias');

            $antecedentesPersonalesPatologicos->Fracturas = $request->input('Fracturas');
            $antecedentesPersonalesPatologicos->EspFracturas = $request->input('EspFracturas');

            $antecedentesPersonalesPatologicos->Dorsalgias = $request->input('Dorsalgias');
            $antecedentesPersonalesPatologicos->EspDorsalgias = $request->input('EspDorsalgias');

            $antecedentesPersonalesPatologicos->Hospitalizaciones = $request->input('Hospitalizaciones');
            $antecedentesPersonalesPatologicos->EspHospitalizaciones = $request->input('EspHospitalizaciones');

            $antecedentesPersonalesPatologicos->Esguinces = $request->input('Esguinces');
            $antecedentesPersonalesPatologicos->EspEsguinces = $request->input('EspEsguinces');

            $antecedentesPersonalesPatologicos->LesionesArteriales = $request->input('LesionesArteriales');
            $antecedentesPersonalesPatologicos->EspLesionesArteriales = $request->input('EspLesionesArteriales');

            $antecedentesPersonalesPatologicos->Transfusiones = $request->input('Transfusiones');
            $antecedentesPersonalesPatologicos->EspTransfusiones = $request->input('EspTransfusiones');

            $antecedentesPersonalesPatologicos->Luxaciones = $request->input('Luxaciones');
            $antecedentesPersonalesPatologicos->EspLuxaciones = $request->input('EspLuxaciones');

            $antecedentesPersonalesPatologicos->Tetanias = $request->input('Tetanias');
            $antecedentesPersonalesPatologicos->EspTetanias = $request->input('EspTetanias');

            $antecedentesPersonalesPatologicos->Alergias = $request->input('Alergias');
            $antecedentesPersonalesPatologicos->EspAlergias = $request->input('EspAlergias');

            $antecedentesPersonalesPatologicos->Asma = $request->input('Asma');
            $antecedentesPersonalesPatologicos->Epilepsia = $request->input('Epilepsia');

            $antecedentesPersonalesPatologicos->EnfDentales = $request->input('EnfDentales');
            $antecedentesPersonalesPatologicos->EspEnfDentales = $request->input('EspEnfDentales');

            $antecedentesPersonalesPatologicos->EnfOpticas = $request->input('EnfOpticas');
            $antecedentesPersonalesPatologicos->EspEnfOpticas = $request->input('EspEnfOpticas');

            $antecedentesPersonalesPatologicos->AltPsicologicas = $request->input('AltPsicologicas');
            $antecedentesPersonalesPatologicos->EspAltPsicologicas = $request->input('EspAltPsicologicas');


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
