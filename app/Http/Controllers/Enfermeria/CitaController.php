<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function show($id){
        $data = Cita::with(['paciente', 'profesional', 'paciente.pacientable'])->find($id);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
       try{
            $cita = new Cita();

            $cita->tipo = $request->input('tipo');
            $cita->motivo = $request->input('motivo');
            $cita->fecha = $request->input('fecha');

            switch($request->input('tipo')){
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

            $cita->paciente_id = 1;
            $cita->profesional_id = 2;

            $cita->save();

            // Responder
            return response()->json([
                'message' => 'Cita guardada exitosamente',
            ]);

        }catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al guardar la cita',
            ], 500);
        }
    }

    public function update(Request $request, $id){
        $cita = Cita::find($id);

        $cita->tipo = $request->input('tipo');
        $cita->motivo = $request->input('motivo');
        $cita->fecha = $request->input('fecha');

        switch($request->input('tipo')){
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

        // Guardar los cambios
        $cita->save();

        return response()->json([
            'message' => "Cita actualizada exitosamente",
        ]);
    }

    public function destroy($id){
        Cita::find($id)->delete();

        return response()->json([
            'message' => "Cita cancelada exitosamente",
        ]);
    }
}
