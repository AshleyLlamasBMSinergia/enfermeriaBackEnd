<?php

namespace Database\Seeders;

use App\Models\Direccion;
use App\Models\EEmbarazo;
use App\Models\HistorialMedico;
use App\Models\Imagen;
use App\Models\NomEmpleado;
use App\Models\NomPuesto;
use App\Models\Reactivo;
use App\Models\RHDependiente;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Storage::deleteDirectory('public/fotografías');
        // Storage::makeDirectory('public/fotografías');

        $this->call([
            // NomPuestoSeeder::class,
            // DireccionSeeder::class,
            CediSeeder::class,
            InventarioSeeder::class,
            ProfesionalSeeder::class,
            // NomEmpleadoSeeder::class,
            // RHDependienteSeeder::class,
            // APPatologicoSeeder::class,
            // HistorialMedicoSeeder::class,
            // EColumnaVertebralSeeder::class,
            // EOrganoSentidoSeeder::class,
            // EExtremidadSeeder::class,
            // EAbdomenSeeder::class,
            // EToraxSeeder::class,
            // ECabezaSeeder::class,
            // EFisicoSeeder::class,
            // EAntidopingSeeder::class,
            // EASustanciaSeeder::class,
            // EEmbarazoSeeder::class,
            // EVistaSeeder::class,
            // CitaSeeder::class,
            // ConsultaSeeder::class,
            // ExternoSeeder::class,
            // PendienteSeeder::class,
            
            MovimientoTipoSeeder::class,
            //DiagnosticoSeeder::class,
            ReactivoSeeder::class,
            ZonaAfectadaSeeder::class,
            // InsumoSeeder::class,
            // LoteSeeder::class
        ]);

        //$this->traerTodosLosEmpleados();
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

    public function traerTodosLosEmpleados(){

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
                    'Paterno',
                    // 'Foto'
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
                    // El correo no existe en los correos únicos
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
                    'telefono' => '+52'.$empleado->Telefono,
                    'correo' => $empleado->Correo,
                    'direccion_id' => $direccion->id,
                    'estatus' => 'Activo',
                    'cedi_id' => 1,
                    'puesto_id' => $empleado->Puesto,
                ]);

                $pacientable_id = $nomEmpleado->id;
                $pacientable_type = NomEmpleado::class;

                if ($empleado->Foto) {
                    // Obtén la foto en formato binario
                    $imagenBinaria = $empleado->Foto;
                
                    // Genera un nombre único para la imagen
                    $imagenNombre = Str::random(12);
                
                    // Ruta de almacenamiento
                    $ruta = storage_path('app/private/fotografías/' . $imagenNombre . '.jpeg'); // Puedes ajustar la extensión según el formato real de las imágenes
                
                    // Guarda la imagen directamente en el sistema de archivos
                    file_put_contents($ruta, $imagenBinaria);
                
                    // Guarda la información de la imagen en la base de datos
                    $imagen = Imagen::create([
                        'url' => $imagenNombre . '.jpeg',
                        'categoria' => 'fotografías',
                        'imageable_id' => $pacientable_id,
                        'imageable_type' => $pacientable_type
                    ]);
                }
                
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
}
