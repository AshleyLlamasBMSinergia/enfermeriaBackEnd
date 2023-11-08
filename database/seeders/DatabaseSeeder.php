<?php

namespace Database\Seeders;

use App\Models\EEmbarazo;
use App\Models\Reactivo;
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
            // NomPuestoSeeder::class,
            // DireccionSeeder::class,
            CediSeeder::class,
            InventarioSeeder::class,
            ProfesionalSeeder::class,
            // NomEmpleadoSeeder::class,
            // RHDependienteSeeder::class,
            // APPatologicoSeeder::class,
            // HistorialMedicoSeeder::class,
            // EColumnaVertebralSeeder::class,
            // EOrganoSentidoSeeder::class,
            // EExtremidadSeeder::class,
            // EAbdomenSeeder::class,
            // EToraxSeeder::class,
            // ECabezaSeeder::class,
            // EFisicoSeeder::class,
            // EAntidopingSeeder::class,
            // EASustanciaSeeder::class,
            // EEmbarazoSeeder::class,
            // EVistaSeeder::class,
            // CitaSeeder::class,
            // ConsultaSeeder::class,
            // ExternoSeeder::class,
            // PendienteSeeder::class,
            
            MovimientoTipoSeeder::class,
            //DiagnosticoSeeder::class,
            ReactivoSeeder::class
            // InsumoSeeder::class,
            // LoteSeeder::class
        ]);
    }
}
