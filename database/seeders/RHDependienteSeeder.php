<?php

namespace Database\Seeders;

use App\Models\RHDependiente;
use Illuminate\Database\Seeder;

class RHDependienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RHDependiente::factory(20)->create();
    }
}
