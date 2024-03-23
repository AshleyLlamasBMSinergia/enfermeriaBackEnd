<?php

namespace App\Http\Controllers\enfermeria;

use App\Http\Controllers\Controller;
use App\Models\Cedi;
use App\Models\Direccion;
use App\Models\HistorialMedico;
use App\Models\NomEmpleado;
use App\Models\NomPuesto;
use App\Models\User;
use App\Services\DataBaseService;
use App\Services\HeaderService;
use Exception;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EmpleadoController extends Controller
{
    protected $dataBaseService;
    protected $headerProfesionalCedisService;

    public function __construct(HeaderService $headerService, DataBaseService $dataBaseService)
    {
        $this->dataBaseService = $dataBaseService;
        $this->headerProfesionalCedisService = $headerService->getProfesionalCedisFromHeader();
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

    public function index(){
        $data = NomEmpleado::whereIn('cedi_id', $this->headerProfesionalCedisService->pluck('id'))->get();
        return response()->json($data, 200);
    }

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
                    'estatus' => true,
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

    public function buscarEmpleado($cedi_id, $numero){
        try{
            $cedi = Cedi::find($cedi_id);

            switch($cedi->empresa_id){
                case 1: //CAN
                    $BDRecursosHumanos = DB::connection('RecursosHumanosCAN');
                    $imagen = 'https://200.92.206.26:3443/gaz/public/api/empleado/imagen/'.$numero;
                break;
                case 2: //CVN
                    
                break;
                case 5: //ENV
                    
                break;
                case 11: //FCO
                    $BDRecursosHumanos = DB::connection('RecursosHumanosFCO');
                    $imagen = 'https://200.92.206.26:4433/gazfco/public/api/empleado/imagen/'.$numero;

                break;
                case 12: //SBM
                    $BDRecursosHumanos = DB::connection('RecursosHumanosSBM');
                    $imagen = 'https://200.92.206.26:3443/gazsbm/public/api/empleado/imagen/'.$numero;
                break;
                default:
                return response()->json([
                    'error' => 'Empresa del empleado no encontado :('
                ], 404);
            }

            $empleado = $BDRecursosHumanos->table('NomEmpleados')
            ->where('Empleado', $numero)
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
                'Puesto',
                'Calle',
                'Exterior',
                'Interior',
                'Colonia',
                'CP',
                'Localidad',
                'Nombres',
                'Paterno',
            )->get();

            if(!$empleado){
                return response()->json(['error' => 'Empleado no encontrado'], 404);
            }

            $data = [$empleado, $imagen];

            return response()->json($data, 200);
        }catch(Exception $e){
            Log::error($e);
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }
}
