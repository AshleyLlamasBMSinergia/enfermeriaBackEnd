<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Externo;
use App\Models\NomEmpleado;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index(){
        $data = Consulta::with(['cita', 'profesional', 'pacientable'])->get();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        try{
            $consulta = new Consulta();

            // $consulta->cita_id = $request['cita_id'];
            $consulta->fecha = $request['fecha'];
            $consulta->profesional_id = $request['profesional_id'];
            $consulta->pacientable_id = $request['pacientable_id'];
            
            switch($request['tipoPaciente']){
                case 'Empleado':
                    $consulta->pacientable_type = NomEmpleado::class;
                break;
                case 'Externo';
                    $consulta->pacientable_type = Externo::class;
                break;

            }

            $consulta->triajeClasificacion = $request['triajeClasificacion'];
            $consulta->precionDiastolica = $request['precionDiastolica'];
            $consulta->frecuenciaRespiratoria = $request['frecuenciaRespiratoria'];
            $consulta->frecuenciaCardiaca = $request['frecuenciaCardiaca'];
            $consulta->temperatura = $request['temperatura'];
            $consulta->edad = $request['edad'];
            $consulta->peso = $request['peso'];
            $consulta->talla = $request['talla'];
            $consulta->grucemiaCapilar = $request['grucemiaCapilar'];
            $consulta->subjetivo = $request['subjetivo'];
            $consulta->objetivo = $request['objetivo'];
            $consulta->analisis = $request['analisis'];
            $consulta->plan = $request['plan'];
            $consulta->diagnostico = $request['diagnostico'];
            $consulta->receta = $request['receta'];
            $consulta->save();

            return response()->json(['message' => 'Consulta guardada con éxito'], 201);

        }catch(\Exception $e){
            return response()->json([
                // 'error' => 'Ocurrió un error al guardar la consulta'
                'error' => $e
            ], 500);
        }
    }

    public function show($id){
        $data = Consulta::with(['pacientable', 'cita', 'profesional'])->find($id);

        if (!$data) {
            return response()->json(['error' => 'Consulta no encontrada'], 404);
        }
        return response()->json($data, 200);
    }
}
