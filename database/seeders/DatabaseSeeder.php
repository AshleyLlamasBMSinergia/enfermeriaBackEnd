<?php

namespace Database\Seeders;

use App\Models\Cedi;
use App\Models\Departamento;
use App\Models\Direccion;
use App\Models\Empresa;
use App\Models\HistorialMedico;
use App\Models\NomEmpleado;
use App\Models\NomEstado;
use App\Models\NomLocalidad;
use App\Models\NomPuesto;
use App\Models\RHDependiente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->traerTodasLasLocalidades();
        
        $this->call([
            EmpresaSeeder::class,
            CediSeeder::class,
            InventarioSeeder::class,

            RoleSeeder::class,
            ProfesionalSeeder::class,

            MovimientoTipoSeeder::class,

            ReactivoSeeder::class,
            ZonaAfectadaSeeder::class,
        ]);

        // $this->traerMasEmpresas(); 
        // $this->traerMasCedis(); 

        $this->traerTodosLosPuestos();
        $this->traerEmpleados();
        // $this->departamentos();
    }

    public function traerMasCedis(){
        // CYSA
        $direccion = Direccion::create([
            'calle' => 'Norman E. Borlaug Esq. Calle 300',
            'exterior' => null,
            'interior' => null,
            'colonia' => 'Col. La Misión',
            'CP' => 'C.P. 85098',
            'localidad_id' => 107,
        ]);

        //11
        Cedi::create([
            'nombre' => 'Obregon',
            'empresa_id' => 3,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Calle De La Plata  (Esq. Con Viñedos)',
            'exterior' => 'No.372',
            'interior' => null,
            'colonia' => null,
            'CP' => 'CP. 21385',
            'localidad_id' => 100,
        ]);

        //12
        Cedi::create([
            'nombre' => 'Hermosillo',
            'empresa_id' => 3,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Carretera Internacional Km. 1781 Sur Zona Industrial',
            'exterior' => null,
            'interior' => null,
            'colonia' => null,
            'CP' => 'CP. 85800',
            'localidad_id' => null,
        ]);

        //13
        Cedi::create([
            'nombre' => 'Navojoa',
            'empresa_id' => 3,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Av. Luis Donaldo Colosio',
            'exterior' => '#2453',
            'interior' => null,
            'colonia' => 'Col. John F. Kennedy',
            'CP' => 'C.P. 84065',
            'localidad_id' => 101,
        ]);

        //14
        Cedi::create([
            'nombre' => 'Nogales',
            'empresa_id' => 3,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Av. Melchor Ocampo',
            'exterior' => '#104',
            'interior' => null,
            'colonia' => 'Col. Los Arcos',
            'CP' => 'C.P. 84600',
            'localidad_id' => 99,
        ]);

        //15
        Cedi::create([
            'nombre' => 'Caborca',
            'empresa_id' => 3,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Norman E. Borlaug Esq. Calle 300',
            'exterior' => null,
            'interior' => null,
            'colonia' => 'Col. La Misión',
            'CP' => 'C.P. 85098.',
            'localidad_id' => 107,
        ]);

        //16
        Cedi::create([
            'nombre' => 'Guaymas',
            'empresa_id' => 3,
            'direccion_id' => $direccion->id
        ]);

        //BEL
        $direccion = Direccion::create([
            'calle' => 'CR NORMAN E BORLAUG',
            'exterior' => null,
            'interior' => null,
            'colonia' => 'LA MISION',
            'CP' => null,
            'localidad_id' => 107,
        ]);

        //17
        Cedi::create([
            'nombre' => 'Obregon',
            'empresa_id' => 13,
            'direccion_id' => $direccion->id
        ]);
    }

    public function traerMasEmpresas(){
        Empresa::create([
            'id' => 3,
            'RFC' => '',
            'Nombre' => 'CYSA',
            'NombreLargo' => 'CYSA',
            'Path' => '25.63.56.136\SQLSVR|RecursosHumanosCYSA',
            'Path2' => '172.16.80.2\sqlsvr|RecursosHumanosCYSA',
        ]);

        Empresa::create([
            'id' => 13,
            'RFC' => '',
            'Nombre' => 'BEL',
            'NombreLargo' => 'BEL',
            'Path' => '25.63.56.136\SQLSVR|RecursosHumanosBEL',
            'Path2' => '172.16.80.2\sqlsvr|RecursosHumanosBEL',
        ]);
    }

    public function departamentos(){
        $departamentos = DB::connection('RecursosHumanosCAN')->table('NomDepartamentos')->get();

        foreach($departamentos as $departamento){
            Departamento::create([
                'departamento' => $departamento->Departamento,
                'nombre' => $departamento->Nombre,
                'grupo' => $departamento->Grupo,
                'depto' => $departamento->Depto,
                'cedi_id' => $departamento->Plaza
            ]);
        }
    }

    public function traerTodosLosPuestos(){

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
    }

    // public function traerTodasLasLocalidades(){
    //     $RecursosHumanosCAN = DB::connection('RecursosHumanosCAN');

    //     $estados = $RecursosHumanosCAN->table('NomEstados')->get();

    //     foreach($estados as $estado) {
    //         $nuevoEstado = NomEstado::create([
    //             'estado' => $estado->Estado,
    //             'nombre' => $estado->Nombre,
    //             'clave' => $estado->Clave,
    //         ]);

    //         $localidades = $RecursosHumanosCAN->table('NomLocalidades')->where('Estado', $estado->Estado)->first();

    //         foreach($localidades as $localidad) {
    //             NomLocalidad::create([
    //                 'localidad' => $localidad->Localidad,
    //                 'nombre' => $localidad->NombreLocalidad,
    //                 'clave' => $localidad->Clave,
    //                 'municipio' => $localidad->NombreMunicipio,
    //                 'estado_id' => $nuevoEstado->id,
    //             ]);
    //         }
    //     }
    // }

    public function traerTodasLasLocalidades(){
        $RecursosHumanosCAN = DB::connection('RecursosHumanosCAN');
    
        $estados = $RecursosHumanosCAN->table('NomEstados')->get();
    
        foreach($estados as $estado) {
            $nuevoEstado = NomEstado::create([
                'estado' => $estado->Estado,
                'nombre' => $estado->Nombre,
                'clave' => $estado->Clave,
            ]);
    
            $localidades = $RecursosHumanosCAN->table('NomLocalidades')->where('Estado', $estado->Estado)->get();
    
            foreach($localidades as $localidad) {
                NomLocalidad::create([
                    'localidad' => $localidad->Localidad,
                    'nombre' => $localidad->NombreLocalidad,
                    'clave' => $localidad->Clave,
                    'municipio' => $localidad->NombreMunicipio,
                    'estado_id' => $nuevoEstado->id,
                ]);
            }
        }
    }
    

    public function asignarCedis($empresa, $plaza){
        switch($empresa){
            case 'RecursosHumanosCAN':
                switch($plaza){
                    case 1:
                        $cedi = 1;
                    break;
                    case 2:
                        $cedi = 2;
                    break;
                    case 3:
                        $cedi = 3;
                    break;
                    case 4:
                        $cedi = 4;
                    break;
                    case 5:
                        $cedi = 5;
                    break;
                    case 6:
                        $cedi = 6;
                    break;
                    default:
                        $cedi = null;
                    break;
                }
            break;
            case 'RecursosHumanosSMB':
                switch($plaza){
                    case 1:
                        $cedi = 7;
                    break;
                    case 2:
                        $cedi = 8;
                    break;
                    default:
                        $cedi = null;
                    break;
                }
            break;
            case 'RecursosHumanosFCO':
                switch($plaza){
                    case 1:
                        $cedi = 9;
                    break;
                    default:
                        $cedi = null;
                    break;
                }
            break;
            case 'RecursosHumanosENV':
                switch($plaza){
                    case 1:
                        $cedi = 10;
                    break;
                    default:
                        $cedi = null;
                    break;
                }
            break;
            case 'RecursosHumanosCYSA':
                switch($plaza){
                    case 1:
                        $cedi = 11;
                    break;
                    case 2:
                        $cedi = 12;
                    break;
                    case 3:
                        $cedi = 13;
                    break;
                    case 4:
                        $cedi = 14;
                    break;
                    case 5:
                        $cedi = 15;
                    break;
                    case 6:
                        $cedi = 16;
                    break;
                    default:
                        $cedi = null;
                    break;
                }
            break;
            case 'RecursosHumanosBEL':
                switch($plaza){
                    case 1:
                        $cedi = 17;
                    break;
                    default:
                        $cedi = null;
                    break;
                }
            break;
        }

        return $cedi;
    }

    public function traerEmpleados(){
        $empresas = [
            'RecursosHumanosCAN',
            // 'RecursosHumanosSBM',
            // 'RecursosHumanosFCO',
            // 'RecursosHumanosENV',
            // 'RecursosHumanosCYSA',
            // 'RecursosHumanosBEL'
        ];

        foreach($empresas as $empresa){
            $RecursosHumanos = DB::connection($empresa);

            $empleados = $RecursosHumanos->table('NomEmpleados')
            ->where('Baja', 0)
            ->select(
                'Plaza',
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
                // 'Foto'
            )->get();

            foreach($empleados as $empleado){

                $buscandoLocalidad = NomLocalidad::where('localidad', $empleado->Localidad);
                if($buscandoLocalidad->exists()){
                    $localidad = $buscandoLocalidad->first();
                    $localidadId = $localidad->id;
                }else{
                    $localidad = $RecursosHumanos->table('NomLocalidades')->where('Localidad', $empleado->Localidad)->first();
                    
                    $buscarEstado = NomEstado::where('estado', $localidad->Estado);
                    if($buscarEstado->exists()){
                        $estado = $buscarEstado->first();
                        $estadoId = $estado->id;
                    }else{
                        $estado = $RecursosHumanos->table('NomEstados')->where('Estado', $localidad->Estado)->first();

                        $nuevoEstado = NomEstado::create([
                            'estado' => $localidad->Estado,
                            'nombre' => $localidad->Nombre,
                            'clave' => $localidad->Clave,
                        ]);

                        $estadoId = $nuevoEstado->id;
                    }

                    $nuevaLocalidad = NomLocalidad::create([
                        'localidad' => $localidad->Localidad,
                        'nombre' => $localidad->NombreLocalidad,
                        'clave' => $localidad->Clave,
                        'municipio' => $localidad->NombreMunicipio,
                        'estado_id' => $estadoId
                    ]);
    
                    $localidadId = $nuevaLocalidad->id;
                }
    
                $direccion = Direccion::create([
                    'calle' => $empleado->Calle,
                    'exterior' => $empleado->Exterior,
                    'interior' => $empleado->Interior,
                    'colonia' => $empleado->Colonia,
                    'CP' => $empleado->CP,
                    'localidad_id' => $localidadId,
                ]);
    
                $cedi = $this->asignarCedis($empresa, $empleado->Plaza);
    
                if(NomPuesto::where('id', $empleado->Puesto)->exists()){
                    $puesto = NomPuesto::find($empleado->Puesto);
                }else{
                    $puestoData = $RecursosHumanos->table('NomPuestos')->where('Puesto', $empleado->Puesto)->first();
                
                    $puesto = NomPuesto::create([
                        'id' => $puestoData->Puesto,
                        'nombre' => ucfirst(mb_strtolower($puestoData->Nombre, 'UTF-8')),
                    ]);
                }
                
                $nomEmpleado = NomEmpleado::create([
                    'numero' => $empleado->Empleado,
                    'nombre' => $empleado->Nombre,
                    'RFC' => $empleado->RFC,
                    'CURP' => $empleado->Curp,
                    'sexo' => $empleado->Sexo,
                    'fechaNacimiento' => $empleado->FechaNacimiento,
                    'estadoCivil' => $empleado->EstadoCivil,
                    'telefono' => '+52'.$empleado->Telefono,
                    'correo' => $empleado->Correo,
                    'direccion_id' => $direccion->id,
                    'estatus' => true,
                    'cedi_id' => $cedi,
                    'puesto_id' => $puesto->id,
                ]);
    
                $pacientable_id = $nomEmpleado->id;
                $pacientable_type = NomEmpleado::class;
    
                //Crear historial medico del empleado
                HistorialMedico::create([
                    'pacientable_id' => $pacientable_id,
                    'pacientable_type' => $pacientable_type,
                    'talla' =>  null,
                    'peso' => null,
                ]);
    
                $dependientes = $RecursosHumanos->table('RHDependientes')->where('Empleado', $empleado->Empleado)->get();
    
                //Dar de alta los dependientes del empleado
                foreach ($dependientes as $dependiente){
    
                    $dependiente = RHDependiente::create([
                        'empleado_id' => $nomEmpleado->id,
                        'nombre' => $dependiente->Nombres.' '.$dependiente->Paterno.' '.$dependiente->Materno,
                        'sexo' => $dependiente->Sexo,
                        'fechaNacimiento' => $dependiente->Nacimiento,
                        'parentesco' => $dependiente->Parentesco,
                        'estatus' => $dependiente->Status,
                        'cedi_id' => $cedi
                    ]);
    
                    //Crear historial medico del dependiente del empleado
                    HistorialMedico::create([
                        'pacientable_id' => $dependiente->id,
                        'pacientable_type' => RHDependiente::class,
                    ]);
                }
            }
        }
    }
}
