<?php

namespace App\Http\Controllers\CAN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    public function buscar($id){
        try{
            $data = DB::connection('RecursosHumanosCAN')->table('NomEmpleados')
            ->where('Empleado', $id)
            ->select(
                'Empleado',
                'Nombre',
                'RFC',
                'Curp',
                'Sexo',
                'FechaNacimiento',
                'EstadoCivil',
                'Telefono',
                'Correo',
                'CorreoEmpresa',
                'Puesto',
                'Calle',
                'Exterior',
                'Interior',
                'Colonia',
                'CP',
                'Localidad',
                'Nombres',
                'Paterno',
                // 'Foto'
            )->get();

            // $empleado = $data->first();
            // $empleado->Foto = utf8_encode($empleado->Foto);

            if(!$data){
                return response()->json(['error' => 'Empleado no encontrado'], 404);
            }
            
            return response()->json($data, 200);
        }catch(\Exception $e){
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }
}
