<?php

namespace Database\Seeders;

use App\Models\Direccion;
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

        $this->traerTodosLosPuestos();

        $this->traerTodosLosEmpleadosSBM();
        $this->traerTodosLosEmpleadosCAN();
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

    public function traerTodosLosEmpleadosCAN(){

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
                    'Paterno',
                    'Foto'
                )->get();

            foreach($empleados as $empleado){

                $localidad = NomLocalidad::where('localidad', $empleado->Localidad)->first();

                $direccion = Direccion::create([
                    'calle' => $empleado->Calle,
                    'exterior' => $empleado->Exterior,
                    'interior' => $empleado->Interior,
                    'colonia' => $empleado->Colonia,
                    'CP' => $empleado->CP,
                    'localidad_id' => $localidad->id,
                ]);

                
                // $correosUnicos = User::pluck('email')->unique();

                // // Verificar si el correo ya existe en los correos únicos
                // if ($correosUnicos->contains($empleado->Correo)) {
                //     // Generar un nuevo correo único
                //     $correo = mb_strtolower($empleado->Paterno, 'UTF-8') . Str::random(8) . '@example.com';
                // } else {
                //     // El correo no existe en los correos únicos
                //     $correo = $empleado->Correo;
                // }

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
                    'cedi_id' => 1,
                    'puesto_id' => $empleado->Puesto,
                ]);

                $pacientable_id = $nomEmpleado->id;
                $pacientable_type = NomEmpleado::class;

                // if ($empleado->Foto) {
                //     // Obtén la foto en formato binario
                //     $imagenBinaria = $empleado->Foto;
                
                //     // Genera un nombre único para la imagen
                //     $imagenNombre = Str::random(12);
                
                //     // Ruta de almacenamiento
                //     $ruta = storage_path('app/private/fotografías/' . $imagenNombre . '.jpeg'); // Puedes ajustar la extensión según el formato real de las imágenes
                
                //     // Guarda la imagen directamente en el sistema de archivos
                //     file_put_contents($ruta, $imagenBinaria);
                
                //     // Guarda la información de la imagen en la base de datos
                //     $imagen = Imagen::create([
                //         'url' => $imagenNombre . '.jpeg',
                //         'categoria' => 'fotografías',
                //         'imageable_id' => $pacientable_id,
                //         'imageable_type' => $pacientable_type
                //     ]);
                // }
                
                // $nombreCompleto = $empleado->Nombres;
                // $nombres = explode(' ', $nombreCompleto);
                // $primerNombre = $nombres[0];

                // User::create([
                //     'name' => $empleado->Nombre,
                //     'email' => $correo,
                //     'password' => Hash::make(Str::random(8)),
                //     'nickname' => $primerNombre.' '.$empleado->Paterno,
                //     'useable_id' => $pacientable_id,
                //     'useable_type' => $pacientable_type,
                // ]);

                HistorialMedico::create([
                    'pacientable_id' => $pacientable_id,
                    'pacientable_type' => $pacientable_type,
                    'talla' =>  null,
                    'peso' => null,
                ]);

                $dependientes = $RecursosHumanosCAN->table('RHDependientes')->where('Empleado', $empleado->Empleado)->get();

                foreach ($dependientes as $dependiente){

                    $dependiente = RHDependiente::create([
                        'empleado_id' => $nomEmpleado->id,
                        'nombre' => $dependiente->Nombres.' '.$dependiente->Paterno.' '.$dependiente->Materno,
                        'sexo' => $dependiente->Sexo,
                        'fechaNacimiento' => $dependiente->Nacimiento,
                        'parentesco' => $dependiente->Parentesco,
                        'estatus' => $dependiente->Status,
                    ]);

                    HistorialMedico::create([
                        'pacientable_id' => $dependiente->id,
                        'pacientable_type' => RHDependiente::class,
                    ]);
                }
            }
    }

    public function traerTodosLosEmpleados(){
        $servidores = ['RecursosHumanosSBM', 'RecursosHumanosCAN'];

        foreach($servidores as $servidor){
            $RecursosHumanos = DB::connection($servidor);

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
                    'Foto'
                )->get();
            
            foreach($empleados as $empleado){

                $localidad = NomLocalidad::where('localidad', $empleado->Localidad)->first();

                $direccion = Direccion::create([
                    'calle' => $empleado->Calle,
                    'exterior' => $empleado->Exterior,
                    'interior' => $empleado->Interior,
                    'colonia' => $empleado->Colonia,
                    'CP' => $empleado->CP,
                    'localidad_id' => $localidad->id,
                ]);

                switch($servidor){
                    case 'RecursosHumanosSBM':
                        switch($empleado->Plaza){
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
                    case 'RecursosHumanosCAN':
                        switch($empleado->Plaza){
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
                    'puesto_id' => $empleado->Puesto,
                ]);

                $pacientable_id = $nomEmpleado->id;
                $pacientable_type = NomEmpleado::class;

                // if ($empleado->Foto) {
                //     // Obtén la foto en formato binario
                //     $imagenBinaria = $empleado->Foto;
                
                //     // Genera un nombre único para la imagen
                //     $imagenNombre = Str::random(12);
                
                //     // Ruta de almacenamiento
                //     $ruta = storage_path('app/private/fotografías/' . $imagenNombre . '.jpeg'); // Puedes ajustar la extensión según el formato real de las imágenes
                
                //     // Guarda la imagen directamente en el sistema de archivos
                //     file_put_contents($ruta, $imagenBinaria);
                
                //     // Guarda la información de la imagen en la base de datos
                //     $imagen = Imagen::create([
                //         'url' => $imagenNombre . '.jpeg',
                //         'categoria' => 'fotografías',
                //         'imageable_id' => $pacientable_id,
                //         'imageable_type' => $pacientable_type
                //     ]);
                // }
                
                // $nombreCompleto = $empleado->Nombres;
                // $nombres = explode(' ', $nombreCompleto);
                // $primerNombre = $nombres[0];

                // User::create([
                //     'name' => $empleado->Nombre,
                //     'email' => $correo,
                //     'password' => Hash::make(Str::random(8)),
                //     'nickname' => $primerNombre.' '.$empleado->Paterno,
                //     'useable_id' => $pacientable_id,
                //     'useable_type' => $pacientable_type,
                // ]);

                HistorialMedico::create([
                    'pacientable_id' => $pacientable_id,
                    'pacientable_type' => $pacientable_type,
                    'talla' =>  null,
                    'peso' => null,
                ]);

                $dependientes = $RecursosHumanos->table('RHDependientes')->where('Empleado', $empleado->Empleado)->get();

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

                    HistorialMedico::create([
                        'pacientable_id' => $dependiente->id,
                        'pacientable_type' => RHDependiente::class,
                    ]);
                }
            }
        }
    }

    public function traerTodosLosEmpleadosSBM(){

            $RecursosHumanosSBM = DB::connection('RecursosHumanosSBM');

            $empleados = $RecursosHumanosSBM->table('NomEmpleados')
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
                    'Foto'
                )->get();

            foreach($empleados as $empleado){

                $localidad = NomLocalidad::where('localidad', $empleado->Localidad)->first();

                $direccion = Direccion::create([
                    'calle' => $empleado->Calle,
                    'exterior' => $empleado->Exterior,
                    'interior' => $empleado->Interior,
                    'colonia' => $empleado->Colonia,
                    'CP' => $empleado->CP,
                    'localidad_id' => $localidad->id,
                ]);

                switch($empleado->Plaza){
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
                    'puesto_id' => $empleado->Puesto,
                ]);

                $pacientable_id = $nomEmpleado->id;
                $pacientable_type = NomEmpleado::class;

                // if ($empleado->Foto) {
                //     // Obtén la foto en formato binario
                //     $imagenBinaria = $empleado->Foto;
                
                //     // Genera un nombre único para la imagen
                //     $imagenNombre = Str::random(12);
                
                //     // Ruta de almacenamiento
                //     $ruta = storage_path('app/private/fotografías/' . $imagenNombre . '.jpeg'); // Puedes ajustar la extensión según el formato real de las imágenes
                
                //     // Guarda la imagen directamente en el sistema de archivos
                //     file_put_contents($ruta, $imagenBinaria);
                
                //     // Guarda la información de la imagen en la base de datos
                //     $imagen = Imagen::create([
                //         'url' => $imagenNombre . '.jpeg',
                //         'categoria' => 'fotografías',
                //         'imageable_id' => $pacientable_id,
                //         'imageable_type' => $pacientable_type
                //     ]);
                // }
                
                // $nombreCompleto = $empleado->Nombres;
                // $nombres = explode(' ', $nombreCompleto);
                // $primerNombre = $nombres[0];

                // User::create([
                //     'name' => $empleado->Nombre,
                //     'email' => $correo,
                //     'password' => Hash::make(Str::random(8)),
                //     'nickname' => $primerNombre.' '.$empleado->Paterno,
                //     'useable_id' => $pacientable_id,
                //     'useable_type' => $pacientable_type,
                // ]);

                HistorialMedico::create([
                    'pacientable_id' => $pacientable_id,
                    'pacientable_type' => $pacientable_type,
                    'talla' =>  null,
                    'peso' => null,
                ]);

                $dependientes = $RecursosHumanosSBM->table('RHDependientes')->where('Empleado', $empleado->Empleado)->get();

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

                    HistorialMedico::create([
                        'pacientable_id' => $dependiente->id,
                        'pacientable_type' => RHDependiente::class,
                    ]);
                }
            }
    }
}
