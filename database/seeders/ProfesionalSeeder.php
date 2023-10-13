<?php

namespace Database\Seeders;

use App\Models\Profesional;
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
        Profesional::create([
            'nombre' => 'Jose Omar Bravo Canela',
            'telefono' => '+526861390077',
            'correo' => 'allamasg@gmail.com',
            'cedula' => '1212 - 1232 - 3221',
            'empresa_id' => 1,
            'direccion_id' => 1,
            'estatus' => 'Activo',
            'puesto_id' => 1,
        ]);
    }
}
