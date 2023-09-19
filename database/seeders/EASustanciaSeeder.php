<?php

namespace Database\Seeders;

use App\Models\EASustancia;
use Illuminate\Database\Seeder;

class EASustanciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EASustancia::factory(50)->create();
    }
}
