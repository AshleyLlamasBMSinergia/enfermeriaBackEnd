<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsuariosSeeder::class,
            NomPuestoSeeder::class,
            NomEmpleadoSeeder::class,
            //APPatologicoSeeder::class,
            HistorialMedicoSeeder::class,
            CitaSeeder::class,
            ConsultaSeeder::class,
            ExternoSeeder::class
        ]);
    }
}
