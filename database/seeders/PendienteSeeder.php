<?php

namespace Database\Seeders;

use App\Models\Pendiente;
use Illuminate\Database\Seeder;

class PendienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pendiente::factory(10)->create();
    }
}
