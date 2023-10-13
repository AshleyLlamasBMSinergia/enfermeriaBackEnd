<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\APNPatologico;
use App\Models\HistorialMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class APNPatologicoController extends Controller
{
    public function show(APNPatologico $antecedentesPersonalesNoPatologicos){
        $data = APNPatologico::find($antecedentesPersonalesNoPatologicos);
        if (!$data) {
            return response()->json(['error' => 'Antecedentes personales no patológicos no encontrado'], 404);
        }
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        try{
            $antecedentesPersonalesNoPatologicos = new APNPatologico();

            $antecedentesPersonalesNoPatologicos->anticonceptivos = $request['anticonceptivos'];
            $antecedentesPersonalesNoPatologicos->espAnticonceptivos = $request['espAnticonceptivos'];

            $antecedentesPersonalesNoPatologicos->obstetrico = $request['obstetrico'];
            $antecedentesPersonalesNoPatologicos->espObstetrico = $request['espObstetrico'];

            $antecedentesPersonalesNoPatologicos->menarca = $request['menarca'];
            $antecedentesPersonalesNoPatologicos->espMenarca = $request['espMenarca'];

            $antecedentesPersonalesNoPatologicos->alcoholismo = $request['alcoholismo'];
            $antecedentesPersonalesNoPatologicos->tabaquismo = $request['tabaquismo'];

            $antecedentesPersonalesNoPatologicos->toxicomanias = $request['toxicomanias'];
            $antecedentesPersonalesNoPatologicos->espToxicomanias = $request['espToxicomanias'];

            $antecedentesPersonalesNoPatologicos->religion = $request['religion'];
            $antecedentesPersonalesNoPatologicos->espReligion = $request['espReligion'];

            $antecedentesPersonalesNoPatologicos->pasatiempos = $request['pasatiempos'];

            $antecedentesPersonalesNoPatologicos->tipoYRH = $request['tipoYRH'];

            $antecedentesPersonalesNoPatologicos->inmunizaciones = $request['inmunizaciones'];
            $antecedentesPersonalesNoPatologicos->espInmunizaciones = $request['espInmunizaciones'];

            $antecedentesPersonalesNoPatologicos->alimentacion = $request['alimentacion'];

            $antecedentesPersonalesNoPatologicos->aseoPersonal = $request['aseoPersonal'];

            $antecedentesPersonalesNoPatologicos->deportes = $request['deportes'];
            $antecedentesPersonalesNoPatologicos->espDeportes = $request['espDeportes'];

            $antecedentesPersonalesNoPatologicos->bajo = $request['bajo'];
            $antecedentesPersonalesNoPatologicos->sobrePeso = $request['sobrePeso'];
            $antecedentesPersonalesNoPatologicos->hacinamiento = $request['hacinamiento'];
            $antecedentesPersonalesNoPatologicos->promiscuidad = $request['promiscuidad'];
            $antecedentesPersonalesNoPatologicos->save();

            // Obtener la ID del HistorialesMedicos desde el request
            $historialMedicoId = $request->input('historialMedico_id');

            // Buscar el registro de HistorialesMedicos
            $historialMedico = HistorialMedico::find($historialMedicoId);
    
            // Asignar la relación con el APPatologicos
            if ($historialMedico) {
                $historialMedico->APNPatologicos_id = $antecedentesPersonalesNoPatologicos->id;
                $historialMedico->save();
            }else{
                return response()->json([
                    'error' => 'Historial médico no encontrado'
                ], 500);
            }

            // Responder
            return response()->json([
                'message' => 'Antecedentes personales no patológicos guardados exitosamente',
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
            $antecedentesPersonalesNoPatologicos = APNPatologico::find($id);

            if (!$antecedentesPersonalesNoPatologicos) {
                return response()->json(['error' => 'Antecedentes personales patológicos no encontrados'], 404);
            }

            
            $antecedentesPersonalesNoPatologicos->anticonceptivos = $request['anticonceptivos'];
            $antecedentesPersonalesNoPatologicos->espAnticonceptivos = $request['espAnticonceptivos'];

            $antecedentesPersonalesNoPatologicos->obstetrico = $request['obstetrico'];
            $antecedentesPersonalesNoPatologicos->espObstetrico = $request['espObstetrico'];

            $antecedentesPersonalesNoPatologicos->menarca = $request['menarca'];
            $antecedentesPersonalesNoPatologicos->espMenarca = $request['espMenarca'];

            $antecedentesPersonalesNoPatologicos->alcoholismo = $request['alcoholismo'];
            $antecedentesPersonalesNoPatologicos->tabaquismo = $request['tabaquismo'];
            $antecedentesPersonalesNoPatologicos->toxicomanias = $request['toxicomanias'];
            $antecedentesPersonalesNoPatologicos->religion = $request['religion'];
            $antecedentesPersonalesNoPatologicos->pasatiempos = $request['pasatiempos'];
            $antecedentesPersonalesNoPatologicos->tipoYRH = $request['tipoYRH'];

            $antecedentesPersonalesNoPatologicos->inmunizaciones = $request['inmunizaciones'];
            $antecedentesPersonalesNoPatologicos->espInmunizaciones = $request['espInmunizaciones'];

            $antecedentesPersonalesNoPatologicos->alimentacion = $request['alimentacion'];

            $antecedentesPersonalesNoPatologicos->aseoPersonal = $request['aseoPersonal'];

            $antecedentesPersonalesNoPatologicos->deportes = $request['deportes'];
            $antecedentesPersonalesNoPatologicos->espDeportes = $request['espDeportes'];

            $antecedentesPersonalesNoPatologicos->bajo = $request['bajo'];
            $antecedentesPersonalesNoPatologicos->sobrePeso = $request['sobrePeso'];
            $antecedentesPersonalesNoPatologicos->hacinamiento = $request['hacinamiento'];
            $antecedentesPersonalesNoPatologicos->promiscuidad = $request['promiscuidad'];

            $antecedentesPersonalesNoPatologicos->save();
    
            // Responder con éxito
            return response()->json([
                'message' => 'Antecedentes personales no patológicos actualizados exitosamente'
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'error' => 'Ocurrió un error al actualizar los antecedentes personales no patológicos'
            ], 500);
        }
    }
}
