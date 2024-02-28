<?php

namespace Database\Seeders;

use App\Models\NomEmpleado;
use Illuminate\Database\Seeder;

class NomEmpleadoSeeder extends Seeder
{
    public function run()
    {
        NomEmpleado::create([
            'nombre' => 'Jose Omar Bravo Canela',
            'RFC' => 'W3XB550214QI6',
            'CURP' => 'OEGM330826MBSRRR76',
            'IMSS' => '123SS - SAD222 - SA3D',
            'sexo' => 'M',
            'fechaNacimiento' => '1989-05-23',
            'estadoCivil' => 'Soltero',
            'telefono' => '+526864390047',
            'correo' => 'jbravo@bmsinergia.com',
            'empresa_id' => 1,
            'direccion_id' => 2
        ]);

        NomEmpleado::create([
            'nombre' => 'Jose Ramon Barreras Flores',
            'RFC' => 'W3FR550214QI6',
            'CURP' => 'OEGM330826MBSRYY76',
            'IMSS' => '124SS - SAD222 - SA4D',
            'sexo' => 'M',
            'fechaNacimiento' => '1987-02-22',
            'estadoCivil' => 'Soltero',
            'telefono' => '+526866690087',
            'correo' => 'jbarreras@bmsinergia.com',
            'empresa_id' => 1,
            'direccion_id' => 3
        ]);
        
        NomEmpleado::create([
            'nombre' => 'Raul Antonio Leon Nava',
            'RFC' => 'F3FR578914QI6',
            'CURP' => 'OFJM330826MBSIOO76',
            'IMSS' => '124SS - SAVY22 - SA4F',
            'sexo' => 'M',
            'fechaNacimiento' => '1989-06-12',
            'estadoCivil' => 'Casado',
            'telefono' => '+526865564081',
            'correo' => 'rleon@bmsinergia.com',
            'direccion_id' => 4
        ]);

        NomEmpleado::create([
            'nombre' => 'Salvador Yescas Sanchez',
            'RFC' => 'F3FR578432DI6',
            'CURP' => 'OBGU730826MBSIO336',
            'IMSS' => '12ESS - SAVY22 - S2EF',
            'sexo' => 'M',
            'fechaNacimiento' => '1992-08-02',
            'estadoCivil' => 'Soltero',
            'telefono' => '+526862563321',
            'correo' => 'syescas@bmsinergia.com',
            'empresa_id' => 1,
            'direccion_id' => 5
        ]);


        NomEmpleado::create([
            'nombre' => 'Delsy Rocio Galvez Magaña',
            'RFC' => 'E4FR574KL42DI6',
            'CURP' => 'HJKL730826MBSIO336',
            'IMSS' => '13ESS - SMNB22 - S2EF',
            'sexo' => 'F',
            'fechaNacimiento' => '1995-09-09',
            'estadoCivil' => 'Casado',
            'telefono' => '+526862363444',
            'correo' => 'dgalvez@bmsinergia.com',
            'empresa_id' => 1,
            'direccion_id' => 6
        ]);

        NomEmpleado::create([
            'nombre' => 'Andres Sanchez Cano',
            'RFC' => 'D3FR574KO90NI6',
            'CURP' => 'DERTL730826MBUIH896',
            'IMSS' => '13DXX - DFRV22 - S2EF',
            'sexo' => 'F',
            'fechaNacimiento' => '1985-01-11',
            'estadoCivil' => 'Casado',
            'telefono' => '+526863563434',
            'correo' => 'asanchez@bmsinergia.com',
            'empresa_id' => 1,
            'direccion_id' => 7
        ]);

        NomEmpleado::create([
            'nombre' => 'Claudia Lizeth Garcia Rodriguez',
            'RFC' => 'C5FR532DC90NI6',
            'CURP' => 'GEGTL738944MBUIH786',
            'IMSS' => '13DXX - DFRV22 - S2EF',
            'sexo' => 'F',
            'fechaNacimiento' => '1985-01-11',
            'estadoCivil' => 'Casado',
            'telefono' => '+526863563434',
            'correo' => 'cgarciaz@bmsinergia.com',
            'empresa_id' => 1,
            'direccion_id' => 8
        ]);

        // NomEmpleado::factory(10)->create();
    }
}
