<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function create(Request $request)
    {
    
        // Crear una nueva instancia del modelo Cita con los datos recibidos
        $cita = new Cita();
        $cita->tipo = $request->input('Tipo');
        $cita->motivo = $request->input('Motivo');
        $cita->fecha = $request->input('Fecha');

        switch($request->input('Tipo')){
            case 'Consulta':
                $cita->color = '#13D52A';
            break;
            case 'Psicólogo':
                $cita->color = '#EE3DF0';
            break;
            case 'Nutriólogo':
                $cita->color = '#0080FF';
            break;
            default:
                $cita->color = '#FFFFFF';
            break;
        }

        $cita->paciente = 1;
        $cita->profesional = 2;

        $cita->save();

        // Responder
        return response()->json([
            'message' => 'Cita guardada exitosamente',
            // 'cita' => $cita
        ]);
    }
}
