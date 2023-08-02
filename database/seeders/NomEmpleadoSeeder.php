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
        NomEmpleado::factory(50)->create();
    }
}
