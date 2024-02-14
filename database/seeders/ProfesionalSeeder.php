<?php

namespace Database\Seeders;

use App\Models\Direccion;
use App\Models\Horario;
use App\Models\Imagen;
use App\Models\NomPuesto;
use App\Models\Profesional;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfesionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $direccion = Direccion::create([
            'calle' => 'Carretera Mexicali-San Felipe',
            'exterior' => 'Numero
            1198',
            'interior' => '',
            'colonia' => 'Colonia Unión de Residentes
            Lázaro Cardenas',
            'CP' => 'C.P. 21383',
            'localidad_id' => 16,
        ]);

        // $puesto = NomPuesto::create([
        //     'nombre'=> 'Medico Familiar',
        // ]);

        $profesional = Profesional::create([
            'nombre' => 'Dra. Raquel Solis Sanchez',
            'telefono' => '+526869068544',
            'correo' => 'enfermeria@lechelaimperial.com',
            'cedula' => '4829605',
            'cedis_id' => 1,
            'direccion_id' => $direccion->id,
            'estatus' => 'Activo',
            // 'puesto_id' => $puesto->id,
        ]);

        $profesional->inventarios()->attach(1);

        for( $i = 1; $i <= 5; $i++ ) {
            Horario::create([
                'dia' => $i,
                'entrada' => '15:00',
                'salida' => '18:00',
                'profesional_id' => 1
            ]);
        }

        User::create([
            'name' => 'Dra. Raquel Solis Sanchez',
            'nickname' => 'Dra. Raquel',
            'email' => 'enfermeria@lechelaimperial.com',
            'password' => bcrypt('R4qu31!'),
            'useable_id' => 1,
            'useable_type' => Profesional::class,
        ]);

        $direccion = Direccion::create([
            'calle' => 'Avenida Rapida Oriente',
            'exterior' => 'Número 16818',
            'interior' => '',
            'colonia' => 'Colonia Rio Tijuana 3ra Etapa',
            'CP' => ' C.P.
            22226',
            'localidad_id' => 89,
        ]);

        Profesional::create([
            'correo' => 'enfermeria.tj@lechelaimperial.com',
            'cedis_id' => 1,
            'direccion_id' => $direccion->id,
            'estatus' => 'Activo',
        ]);

        User::create([
            'name' => '',
            'nickname' => '',
            'email' => 'enfermeria.tj@lechelaimperial.com',
            'password' => bcrypt('!'),
            'useable_id' => 2,
            'useable_type' => Profesional::class,
        ]);

        /////////////////////////////////////////////////////

        $direccion = Direccion::create([
            'calle' => 'Dr. Norman E. Borlaug',
            'exterior' => 'S/N',
            'interior' => '',
            'colonia' => 'Col. La Misión
            Obregón',
            'localidad_id' => 95,
        ]);

        Profesional::create([
            'nombre' => 'Dra. Amairany Fraijo Corral',
            'telefono' => '+526621940006',
            'correo' => 'serviciomedicoobr@lecheyaqui.com.mx',
            'cedula' => '13430539',
            'cedis_id' => 2,
            'direccion_id' => $direccion->id,
            'estatus' => 'Activo',
            // 'puesto_id' => 1,
        ]);

        for( $i = 1; $i <= 5; $i++ ) {
            Horario::create([
                'dia' => $i,
                'entrada' => '15:00',
                'salida' => '19:00',
                'profesional_id' => 3
            ]);
        }

        User::create([
            'name' => 'Dra. Amairany Fraijo Corral',
            'nickname' => 'Dra. Amairany',
            'email' => 'serviciomedicoobr@lecheyaqui.com.mx',
            'password' => bcrypt('~4m41r4ny!'),
            'useable_id' => 3,
            'useable_type' => Profesional::class,
        ]);

        /////////////////////////////////////////

        $direccion = Direccion::create([
            'calle' => 'C. de la Plata',
            'exterior' => '#372',
            'interior' => '',
            'colonia' => 'Parque Industrial',
            'localidad_id' => 100,
        ]);

        Profesional::create([
            'nombre' => 'Dr. Juan Manuel Rodríguez Carrillo',
            'telefono' => '+526624753412',
            'correo' => 'serviciomedicohmo@lecheyaqui.com.mx',
            'cedula' => '041472',
            'cedis_id' => 2,
            'direccion_id' => $direccion->id,
            'estatus' => 'Activo',
            // 'puesto_id' => 1,
        ]);

        for( $i = 1; $i <= 5; $i++ ) {
            Horario::create([
                'dia' => $i,
                'entrada' => '6:00',
                'salida' => '13:00',
                'profesional_id' => 4
            ]);
        }

        User::create([
            'name' => 'Dr. Juan Manuel Rodríguez Carrillo',
            'nickname' => 'Dr. Juan Manuel',
            'email' => 'serviciomedicohmo@lecheyaqui.com.mx',
            'password' => bcrypt('~Ju4n!'),
            'useable_id' => 4,
            'useable_type' => Profesional::class,
        ]);

        Profesional::create([
            'nombre' => 'Samara',
            'telefono' => 'Samara',
            'correo' => 'serviciomedicohmo@lecheyaqui.com.mx',
            'cedula' => '041472',
            'cedis_id' => 2,
            'direccion_id' => $direccion->id,
            'estatus' => 'Activo',
            // 'puesto_id' => 1,
        ]);

        for( $i = 1; $i <= 5; $i++ ) {
            Horario::create([
                'dia' => $i,
                'entrada' => '6:00',
                'salida' => '13:00',
                'profesional_id' => 4
            ]);
        }

        User::create([
            'name' => 'Dr. Juan Manuel Rodríguez Carrillo',
            'nickname' => 'Dr. Juan Manuel',
            'email' => 'serviciomedicohmo@lecheyaqui.com.mx',
            'password' => bcrypt('~Ju4n!'),
            'useable_id' => 4,
            'useable_type' => Profesional::class,
        ]);
    }
}
