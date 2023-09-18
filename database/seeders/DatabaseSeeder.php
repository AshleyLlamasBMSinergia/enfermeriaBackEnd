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
            EColumnaVertebralSeeder::class,
            EOrganoSentidoSeeder::class,
            EExtremidadSeeder::class,
            EAbdomenSeeder::class,
            EToraxSeeder::class,
            ECabezaSeeder::class,
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
