<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Storage::deleteDirectory('public/fotografías');
        // Storage::makeDirectory('public/fotografías');

        $this->call([
            UserSeeder::class,
            ImagenSeeder::class,
            NomPuestoSeeder::class,
            DireccionSeeder::class,
            NomEmpleadoSeeder::class,
            //APPatologicoSeeder::class,
            HistorialMedicoSeeder::class,
            EFisicoSeeder::class,
            // CitaSeeder::class,
            // ConsultaSeeder::class,
            ExternoSeeder::class,
            PendienteSeeder::class,
            HorarioSeeder::class,
            InsumoSeeder::class,
            LoteSeeder::class
        ]);
    }
}
