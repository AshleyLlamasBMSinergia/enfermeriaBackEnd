<?php

namespace Database\Seeders;

use App\Models\EColumnaVertebral;
use Illuminate\Database\Seeder;

class EColumnaVertebralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EColumnaVertebral::factory(20)->create();
    }
}
