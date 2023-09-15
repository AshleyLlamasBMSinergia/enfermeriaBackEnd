<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::create([
            'dia' => 1,
            'entrada' => '8:00',
            'inicioBreak' => '13:00',
            'finBreak' => '14:00',
            'salida' => '17:00',
            'profesional_id' => 1
        ]);

        Horario::create([
            'dia' => 2,
            'entrada' => '8:00',
            'inicioBreak' => '13:00',
            'finBreak' => '14:00',
            'salida' => '17:00',
            'profesional_id' => 1
        ]);
    }
}
