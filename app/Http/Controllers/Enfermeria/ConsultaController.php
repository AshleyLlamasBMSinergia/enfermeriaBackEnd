<?php

namespace App\Http\Controllers\Enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Externo;
use App\Models\Lote;
use App\Models\Movimiento;
use App\Models\MovimientoMov;
use App\Models\NomEmpleado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConsultaController extends Controller
{
    public function index(){
        $data = Consulta::with(['cita', 'profesional', 'pacientable'])->get();
        return response()->json($data, 200);
    }

    public function consultasPorProfesional($profesional_id){
        $data = Consulta::where('profesional_id', $profesional_id)->with(['cita', 'profesional', 'pacientable'])->get();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
     
        try{
            $consulta = new Consulta();

            $consulta->cita_id = $request['cita_id'];
            $consulta->fecha = $request['fecha'];
            $consulta->profesional_id = $request['profesional_id'];
            $consulta->pacientable_id = $request['paciente'];
            
            switch($request['tipoPaciente']){
                case 'Empleado':
                    $consulta->pacientable_type = NomEmpleado::class;
                break;
                case 'Externo';
                    $consulta->pacientable_type = Externo::class;
                break;

            }

            $consulta->triajeClasificacion = $request['triajeClasificacion'];
            $consulta->presionDiastolica = $request['presionDiastolica'];
            $consulta->presionSistolica = $request['presionSistolica'];
            $consulta->frecuenciaRespiratoria = $request['frecuenciaRespiratoria'];
            $consulta->frecuenciaCardiaca = $request['frecuenciaCardiaca'];
            $consulta->temperatura = $request['temperatura'];
            $consulta->edad = $request['edad'];
            $consulta->peso = $request['peso'];
            $consulta->talla = $request['talla'];
            $consulta->mg = $request['mg'];
            $consulta->dl = $request['dl'];
            $consulta->subjetivo = $request['subjetivo'];
            $consulta->objetivo = $request['objetivo'];
            $consulta->analisis = $request['analisis'];
            $consulta->plan = $request['plan'];
            $consulta->diagnostico_id = $request['diagnostico_id'];
            $consulta->complemento = $request['complemento'];
            $consulta->receta = $request['receta'];
            $consulta->save();

            if($request->formInsumos){
                $movimiento = Movimiento::create([
                    'fecha' => Carbon::now(),
                    'profesional_id' => $request['profesional_id'],
                    'inventario_id' => $request['inventario_id'],
                    'movimientoTipo_id' => 1,
                ]);

                foreach ($request->formInsumos['itemInsumo'] as $i => $requestInsumo) {
                    foreach($requestInsumo['lotes'] as $requestLote){

                        //SALIDA
                        $lote = Lote::find($requestLote['lote']);

                        $lote->update([
                            'piezasDisponibles' => $lote->piezasDisponibles - $requestLote['cantidad'],
                        ]);

                        MovimientoMov::create([
                            'lote_id' => $lote->id,
                            'unidades' => $requestLote['cantidad'],
                            'movimiento_id' => $movimiento->id,
                            'precio' => ($requestInsumo['precio']/$requestInsumo['piezasPorLote'])*$requestLote['cantidad'],
                        ]);
                    }
                }
            }

            return response()->json(['message' => 'Consulta guardada con éxito'], 201);

        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                // 'error' => 'Ocurrió un error al guardar la consulta'
                'error' => $e
            ], 500);
        }
    }

    public function show($id){
        $data = Consulta::with(['pacientable', 'pacientable.historialMedico', 'pacientable.image', 'cita', 'profesional', 'profesional.image', 'profesional.direccion', 'diagnostico'])->find($id);

        if (!$data) {
            return response()->json(['error' => 'Consulta no encontrada'], 404);
        }
        return response()->json($data, 200);
    }

    public function destroy($id){
        Consulta::find($id)->delete();

        return response()->json([
            'message' => "Consulta eleminado exitosamente",
        ]);
    }
}
