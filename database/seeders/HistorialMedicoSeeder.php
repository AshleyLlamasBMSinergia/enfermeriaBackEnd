<?php

namespace Database\Seeders;

use App\Models\HistorialMedico;
use Illuminate\Database\Seeder;

class HistorialMedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HistorialMedico::factory(8)->create();
    }
}
