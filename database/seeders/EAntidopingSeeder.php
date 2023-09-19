<?php

namespace Database\Seeders;

use App\Models\EAntidoping;
use Illuminate\Database\Seeder;

class EAntidopingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EAntidoping::factory(20)->create();
    }
}
