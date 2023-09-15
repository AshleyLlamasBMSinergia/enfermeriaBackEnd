<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Horario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HorarioController extends Controller
{
    public function horasDisponibles($profesional_id, $fecha)
{
    $fecha = Carbon::createFromFormat('Y-m-d', $fecha);
    $dia = $fecha->dayOfWeek;

    $horario = Horario::where('profesional_id', $profesional_id)->where('dia', $dia)->first();

    if($horario){
        $horas = [];
        $entrada = new \DateTime($horario->entrada);
        $inicioBreak = new \DateTime($horario->inicioBreak);
        $finBreak = new \DateTime($horario->finBreak);
        $salida = new \DateTime($horario->salida);

        while ($entrada < $salida) {
            if ($entrada < $inicioBreak || $entrada >= $finBreak) {
                $horas[] = $entrada->format('H:i');
            }
            $entrada->modify('+1 hour');
        }

        // Obtener citas programadas en esa fecha
        $citas = Cita::where('profesional_id', $profesional_id)
                    ->whereDate('fecha', $fecha->format('Y-m-d'))
                    ->get();

        foreach($citas as $cita) {
            $horaCita = Carbon::parse($cita->fecha)->format('H:i');

            // Eliminar la hora de la lista de horas disponibles
            if(($key = array_search($horaCita, $horas)) !== false) {
                unset($horas[$key]);
            }
        }

        // Reindexar el arreglo antes de retornarlo
        $horas = array_values($horas);

        return response()->json($horas, 200);
    } else {
        return response()->json([], 200);
    }
}

}
