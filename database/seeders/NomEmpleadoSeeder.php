<?php

namespace Database\Seeders;

use App\Models\NomEmpleado;
use Illuminate\Database\Seeder;

class NomEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NomEmpleado::create([
            'nombre' => 'Joseline Ashley',
            'paterno' => 'Llamas',
            'materno' => 'Garcia',
            'RFC' => 'WXXB550214QI6',
            'CURP' => 'OEGM770826MBSRRR76',
            'IMSS' => '123SS - SAD222 - SA3D',
            'sexo' => 'F',
            'fechaNacimiento' => '1999-03-19',
            'estadoCivil' => 'Soltero',
            'telefono' => '+526861390077',
        ]);

        NomEmpleado::create([
            'nombre' => 'Jose Omar',
            'paterno' => 'Bravo',
            'materno' => 'Canela',
            'RFC' => 'W3XB550214QI6',
            'CURP' => 'OEGM330826MBSRRR76',
            'IMSS' => '123SS - SAD222 - SA3D',
            'sexo' => 'M',
            'fechaNacimiento' => '1989-05-23',
            'estadoCivil' => 'Soltero',
            'telefono' => '+526864390047',
        ]);

        NomEmpleado::create([
            'nombre' => 'Jose Ramon',
            'paterno' => 'Barreras',
            'materno' => 'Flores',
            'RFC' => 'W3FR550214QI6',
            'CURP' => 'OEGM330826MBSRYY76',
            'IMSS' => '124SS - SAD222 - SA4D',
            'sexo' => 'M',
            'fechaNacimiento' => '1987-02-22',
            'estadoCivil' => 'Soltero',
            'telefono' => '+526866690087',
        ]);
        
        NomEmpleado::create([
            'nombre' => 'Raul Antonio',
            'paterno' => 'Leon',
            'materno' => 'Nava',
            'RFC' => 'F3FR578914QI6',
            'CURP' => 'OFJM330826MBSIOO76',
            'IMSS' => '124SS - SAVY22 - SA4F',
            'sexo' => 'M',
            'fechaNacimiento' => '1989-06-12',
            'estadoCivil' => 'Casado',
            'telefono' => '+526865564081',
        ]);

        NomEmpleado::create([
            'nombre' => 'Salvador',
            'paterno' => 'Yescas',
            'materno' => 'Sanchez',
            'RFC' => 'F3FR578432DI6',
            'CURP' => 'OBGU730826MBSIO336',
            'IMSS' => '12ESS - SAVY22 - S2EF',
            'sexo' => 'M',
            'fechaNacimiento' => '1992-08-02',
            'estadoCivil' => 'Soltero',
            'telefono' => '+526862563321',
        ]);


        NomEmpleado::create([
            'nombre' => 'Delsy Rocio',
            'paterno' => 'Galvez',
            'materno' => 'Magaña',
            'RFC' => 'E4FR574KL42DI6',
            'CURP' => 'HJKL730826MBSIO336',
            'IMSS' => '13ESS - SMNB22 - S2EF',
            'sexo' => 'F',
            'fechaNacimiento' => '1995-09-09',
            'estadoCivil' => 'Casado',
            'telefono' => '+526862363444',
        ]);

        NomEmpleado::create([
            'nombre' => 'Andres',
            'paterno' => 'Sanchez',
            'materno' => 'Cano',
            'RFC' => 'D3FR574KO90NI6',
            'CURP' => 'DERTL730826MBUIH896',
            'IMSS' => '13DXX - DFRV22 - S2EF',
            'sexo' => 'F',
            'fechaNacimiento' => '1985-01-11',
            'estadoCivil' => 'Casado',
            'telefono' => '+526863563434',
        ]);

        NomEmpleado::create([
            'nombre' => 'Claudia Lizeth',
            'paterno' => 'Garcia',
            'materno' => 'Rodriguez',
            'RFC' => 'C5FR532DC90NI6',
            'CURP' => 'GEGTL738944MBUIH786',
            'IMSS' => '13DXX - DFRV22 - S2EF',
            'sexo' => 'F',
            'fechaNacimiento' => '1985-01-11',
            'estadoCivil' => 'Casado',
            'telefono' => '+526863563434',
        ]);

        // NomEmpleado::factory(10)->create();
    }
}
