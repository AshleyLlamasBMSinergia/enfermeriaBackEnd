<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Direccion;
use App\Models\HistorialMedico;
use App\Models\NomEmpleado;
use App\Models\NomPuesto;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    public function index(){
        $data = NomEmpleado::all();
        return response()->json($data, 200);
    }

    // public function show($id){
    //     $data = NomEmpleado::find($id);
    //     return response()->json($data, 200);
    // }

    // public function show($id){
    //     $data = RhNomEmpleado::getEmpleado($id);
    //     $data->puesto = NomPuesto::getPuesto($data->Puesto);
    //     return $data;
    // }

    public function traerTodosLosPuestos(){

        try{
            $puestos = DB::connection('RecursosHumanosCAN')->table('NomPuestos')
                ->select(
                    'Puesto',
                    'Nombre',
                )->get();

            foreach ($puestos as $puesto) {
            
                //DB::statement('SET IDENTITY_INSERT NomPuestos ON');

                NomPuesto::create([
                    'id' => $puesto->Puesto,
                    'nombre' => ucfirst(mb_strtolower($puesto->Nombre, 'UTF-8'))
                ]);
            }                

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function traerTodosLosEmpleados(){

        try{
            $this->traerTodosLosPuestos();

            $RecursosHumanosCAN = DB::connection('RecursosHumanosCAN');

            $empleados = $RecursosHumanosCAN->table('NomEmpleados')
                ->where('Baja', 0)
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
                    'Paterno'
                )->get();

            foreach($empleados as $empleado){

                $direccion = Direccion::create([
                    'calle' => $empleado->Calle,
                    'exterior' => $empleado->Exterior,
                    'interior' => $empleado->Interior,
                    'colonia' => $empleado->Colonia,
                    'CP' => $empleado->CP,
                    'localidad' => $empleado->Localidad,
                ]);

                
                $correosUnicos = User::pluck('email')->unique();

                // Verificar si el correo ya existe en los correos únicos
                if ($correosUnicos->contains($empleado->Correo)) {
                    // Generar un nuevo correo único
                    $correo = mb_strtolower($empleado->Paterno, 'UTF-8') . Str::random(8) . '@example.com';
                } else {
                    // El correo no existe en los correos únicos, puedes usar el correo existente
                    $correo = $empleado->Correo;
                }

                $nomEmpleado = NomEmpleado::create([
                    'numero' => $empleado->Empleado,
                    'nombre' => $empleado->Nombre,
                    'RFC' => $empleado->RFC,
                    'CURP' => $empleado->Curp,
                    'sexo' => $empleado->Sexo,
                    'fechaNacimiento' => $empleado->FechaNacimiento,
                    'estadoCivil' => $empleado->EstadoCivil,
                    'telefono' => $empleado->Telefono,
                    'correo' => $empleado->Correo,
                    'direccion_id' => $direccion->id,
                    'estatus' => 'Activo',
                    'cedi_id' => 1,
                    'puesto_id' => $empleado->Puesto,
                ]);

                $pacientable_id = $nomEmpleado->id;
                $pacientable_type = NomEmpleado::class;


                $nombreCompleto = $empleado->Nombres;
                $nombres = explode(' ', $nombreCompleto);
                $primerNombre = $nombres[0];

                User::create([
                    'name' => $empleado->Nombre,
                    'email' => $correo,
                    'password' => Hash::make(Str::random(8)),
                    'nickname' => $primerNombre.' '.$empleado->Paterno,
                    'useable_id' => $pacientable_id,
                    'useable_type' => $pacientable_type,
                ]);

                HistorialMedico::create([
                    'pacientable_id' => $pacientable_id,
                    'pacientable_type' => $pacientable_type,
                    'talla' =>  null,
                    'peso' => null,
                ]);
            }

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
