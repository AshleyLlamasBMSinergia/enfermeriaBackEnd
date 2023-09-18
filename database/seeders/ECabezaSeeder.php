<?php

namespace Database\Seeders;

use App\Models\ECabeza;
use Illuminate\Database\Seeder;

class ECabezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ECabeza::factory(20)->create();
    }
}
