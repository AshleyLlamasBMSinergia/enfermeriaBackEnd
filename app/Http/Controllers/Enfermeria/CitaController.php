<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\HistorialMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CitaController extends Controller
{
    public function show($id){
        $data = Cita::with(['paciente', 'profesional', 'paciente.pacientable', 'paciente.pacientable.image'])->find($id);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // Log::error($request);

       try{
            $cita = new Cita();

            $cita->tipo = $request->input('tipo');
            $cita->motivo = $request->input('motivo');
            $cita->fecha = $request->input('fecha');

            switch($request['pacientable_type']){
                case 'Empleado':
                    $pacientable_type = 'App\\Models\\NomEmpleado';
                break;
                case 'Externo':
                    $pacientable_type = 'App\\Models\\Externo';
                break; 
                case 'Dependiente':
                    $pacientable_type = 'App\\Models\\RHDependiente';
                break; 
                default:
                return response()->json([
                    'error' => 'El tipo de paciente no existe',
                ], 500);
            }

            $historialMedico = HistorialMedico::where('pacientable_id', $request['pacientable_id'])->where('pacientable_type', $pacientable_type)->first();

            if(!$historialMedico){
                return response()->json([
                    'error' => 'No se encontro el historial médico del paciente',
                ], 500);
            }

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

            $cita->paciente_id = $historialMedico->id;
            $cita->profesional_id = $request['profesional_id'];

            $cita->save();

            // Responder
            return response()->json([
                'message' => 'Cita guardada exitosamente',
            ]);

        }catch (\Exception $e) {
            Log::error($e);
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
