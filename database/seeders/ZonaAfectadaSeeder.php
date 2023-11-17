<?php

namespace Database\Seeders;

use App\Models\ZonaAfectada;
use Illuminate\Database\Seeder;

class ZonaAfectadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ZonaAfectada::create([
            "zona" => "Lumbar",
        ]);

        ZonaAfectada::create([
            "zona" => "Torso - Abdominal",
        ]);

        ZonaAfectada::create([
            "zona" => "Extremidades inferiores",
        ]);

        ZonaAfectada::create([
            "zona" => "Extremidades superiores",
        ]);

        ZonaAfectada::create([
            "zona" => "Cabeza - Cara",
        ]);
    }
}
