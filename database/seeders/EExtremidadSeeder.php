<?php

namespace Database\Seeders;

use App\Models\EExtremidad;
use Illuminate\Database\Seeder;

class EExtremidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EExtremidad::factory(20)->create();
    }
}
