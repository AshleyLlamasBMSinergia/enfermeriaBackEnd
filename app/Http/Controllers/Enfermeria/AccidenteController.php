<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Accidente;
use App\Models\AccidenteCostEstudio;
use App\Models\Caso;
use App\Models\Departamento;
use App\Models\NomEmpleado;
use App\Services\DataBaseService;
use App\Services\HeaderService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AccidenteController extends Controller
{
    protected $dataBaseService;

    public function __construct(DataBaseService $dataBaseService)
    {
        $this->dataBaseService = $dataBaseService;
    }

    public function getEmpleadoSalario($id){

        $empleadoEnfermeria = NomEmpleado::find($id);

        if (!$empleadoEnfermeria) {
            return response()->json(['error' => 'Empleado de enfermería no encontrado'], 404);
        }

        $conexion = $this->dataBaseService->conexionEmpresa($empleadoEnfermeria->cedi->empresa_id);

        if (!$conexion) {
            return response()->json(['error' => 'Sin conexión en la base de datos'], 500);
        }

        $empleado = $conexion->table('NomEmpleados')->where('Empleado', $empleadoEnfermeria->numero)->first();

        if (!$empleado) {
            return response()->json(['error' => 'Empleado de RH no encontrado'], 404);
        }

        $data = $empleado->Sueldo;

        return response()->json($data, 200);
    }


    public function store(Request $request){
        Log::info($request);

        try{
            $caso = Caso::find($request['caso_id']);

            if (!$caso) {
                return response()->json(['error' => 'Caso no encontrado'], 404);
            }

            $empleadoEnfermeria = NomEmpleado::find($request['empleado_id']);

            if (!$empleadoEnfermeria) {
                return response()->json(['error' => 'Empleado de enfermería no encontrado'], 404);
            }

            $conexion = $this->dataBaseService->conexionEmpresa($empleadoEnfermeria->cedi->empresa_id);

            if (!$conexion) {
                return response()->json(['error' => 'Sin conexión en la base de datos'], 500);
            }

            $empleado = $conexion->table('NomEmpleados')->where('Empleado', $empleadoEnfermeria->numero)->first();
    
            if (!$empleado) {
                return response()->json(['error' => 'Empleado de RH no encontrado'], 404);
            }

            $fechaIngreso = Carbon::parse($empleado->FechaIngreso);
            $hoy = Carbon::now();
    
            $diferencia = $fechaIngreso->diff($hoy);
            $aniosTranscurridos = $diferencia->y;
    
            $turno = $conexion->table('NomHorarios')
            ->where('Horario', $empleado->Horario)
            ->value('TipoJornada');

            $antiguedad = "$aniosTranscurridos AÑOS";

            $accidente = Accidente::create([
                'fecha' => $request['fecha'],
                'lugar' => $request['lugar'],
                'descripcion' => $request['descripcion'],
                'diagnostico_id' => $request['diagnostico_id'],
                'causa' => $request['causa'],
                'canalizado' => $request['canalizado'],
                'clinica' => $request['clinica'],
                'diasIncInterna' => $request['diasIncInterna'],
                'costoIncInterna' => $request['costoIncInterna'],
                'costoEstudio' => $request['costoEstudio'],
                'costoConsulta' => $request['costoConsulta'],
                'costoMedicamento' => $request['costoMedicamento'],
                'costoTotalAccidente' => $request['costoTotalAccidente'],
                'calificacion' => $request['calificacion'],
                'observaciones' => $request['observaciones'],
                'resultado' => $request['resultado'],
                'profesional_id' => $request['profesional_id'],
                'antiguedad' => $antiguedad,
                'turno' => $turno,
                'salario' => $request['salario']
            ]);
    
            if($request['costos']){
                foreach($request['costos'] as $costo){
                    AccidenteCostEstudio::create([
                        'descripcion' => $costo['descripcion'],
                        'monto' => $costo['monto'],
                        'accidente_id' => $accidente->id
                    ]);
                }
            }

            $caso->update(['accidente_id' => $accidente->id]);

            return response()->json(['message' => 'Investigación de accidente guardada con éxito'], 201);

        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'error' => $e
            ], 500);
        }
    }

    public function update($id, Request $request){

        Log::info($request);

        try{
            $accidente = Accidente::find($id);

            if (!$accidente) {
                return response()->json(['error' => 'Investigación deaccidente no encontrado'], 404);
            }

            $empleadoEnfermeria = NomEmpleado::find($request['empleado_id']);

            if (!$empleadoEnfermeria) {
                return response()->json(['error' => 'Empleado de enfermería no encontrado'], 404);
            }

            $conexion = $this->dataBaseService->conexionEmpresa($empleadoEnfermeria->cedi->empresa_id);

            if (!$conexion) {
                return response()->json(['error' => 'Sin conexión en la base de datos'], 500);
            }

            $empleado = $conexion->table('NomEmpleados')->where('Empleado', $empleadoEnfermeria->numero)->first();
    
            if (!$empleado) {
                return response()->json(['error' => 'Empleado de RH no encontrado'], 404);
            }

            $fechaIngreso = Carbon::parse($empleado->FechaIngreso);
            $hoy = Carbon::now();
    
            $diferencia = $fechaIngreso->diff($hoy);
            $aniosTranscurridos = $diferencia->y;
    
            $departamento = Departamento::where('Departamento', $empleado->Departamento)->value('id');

            $turno = $conexion->table('NomHorarios')
            ->where('Horario', $empleado->Horario)
            ->value('TipoJornada');

            $antiguedad = "$aniosTranscurridos AÑOS";

            $accidente->update([
                'fecha' => $request['fecha'],
                'empleado_id' => $request['empleado_id'],
                'departamento_id' => $departamento,
                'lugar' => $request['lugar'],
                'descripcion' => $request['descripcion'],
                'diagnostico_id' => $request['diagnostico_id'],
                'causa' => $request['causa'],
                'canalizado' => $request['canalizado'],
                'clinica' => $request['clinica'],
                'diasIncInterna' => $request['diasIncInterna'],
                'costoIncInterna' => $request['costoIncInterna'],
                'costoEstudio' => $request['costoEstudio'],
                'costoConsulta' => $request['costoConsulta'],
                'costoMedicamento' => $request['costoMedicamento'],
                'costoTotalAccidente' => $request['costoTotalAccidente'],
                'calificacion' => $request['calificacion'],
                'observaciones' => $request['observaciones'],
                'resultado' => $request['resultado'],
                'profesional_id' => $request['profesional_id'],
                'incapacidad_id' => $request['incapacidad_id'],
                'antiguedad' => $antiguedad,
                'turno' => $turno,
                'salario' => $request['salario']
            ]);

            foreach($accidente->accidenteCostEstudios as $costEstudio){
                $costEstudio->delete();
            }
    
            if($request['costos']){
                foreach($request['costos'] as $costo){
                    AccidenteCostEstudio::create([
                        'descripcion' => $costo['descripcion'],
                        'monto' => $costo['monto'],
                        'accidente_id' => $accidente->id
                    ]);
                }
            }

            return response()->json(['message' => 'Investigación de accidente editada con éxito'], 201);
        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'error' => $e
            ], 500);
        }
    }

    public function destroy($id){

        try{
            $accidente = Accidente::find($id);

            foreach($accidente->accidenteCostEstudios as $costEstudio){
                $costEstudio->delete();
            }

            $accidente->delete();

            return response()->json([
                'message' => "Investigación de accidente eliminada exitosamente",
            ]);
        }catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'error' => $e
            ], 500);
        }
    }
}
