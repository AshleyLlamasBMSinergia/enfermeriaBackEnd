<?php

namespace Database\Seeders;

use App\Models\EFisico;
use Illuminate\Database\Seeder;

class EFisicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EFisico::factory(20)->create();
    }
}
