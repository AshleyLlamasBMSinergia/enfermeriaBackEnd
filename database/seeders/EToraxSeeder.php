<?php

namespace Database\Seeders;

use App\Models\ETorax;
use Illuminate\Database\Seeder;

class EToraxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ETorax::factory(20)->create();
    }
}
