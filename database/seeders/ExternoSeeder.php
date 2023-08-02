<?php

namespace Database\Seeders;

use App\Models\Externo;
use Illuminate\Database\Seeder;

class ExternoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Externo::factory(50)->create();
    }
}
