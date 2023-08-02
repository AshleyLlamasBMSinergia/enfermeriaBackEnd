<?php

namespace Database\Seeders;

use App\Models\NomPuesto;
use Illuminate\Database\Seeder;

class NomPuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NomPuesto::factory(10)->create();
    }
}
