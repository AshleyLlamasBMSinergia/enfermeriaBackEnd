<?php

namespace Database\Seeders;

use App\Models\EOrganoSentido;
use Illuminate\Database\Seeder;

class EOrganoSentidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EOrganoSentido::factory(20)->create();
    }
}
