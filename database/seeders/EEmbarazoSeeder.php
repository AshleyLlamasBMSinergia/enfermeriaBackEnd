<?php

namespace Database\Seeders;

use App\Models\EEmbarazo;
use Illuminate\Database\Seeder;

class EEmbarazoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EEmbarazo::factory(10)->create();
    }
}
