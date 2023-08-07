<?php

namespace Database\Seeders;

use App\Models\APPatologico;
use Illuminate\Database\Seeder;

class APPatologicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        APPatologico::factory(10)->create();
    }
}
