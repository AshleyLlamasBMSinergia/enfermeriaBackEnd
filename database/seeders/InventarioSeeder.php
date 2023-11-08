<?php

namespace Database\Seeders;

use App\Models\Direccion;
use App\Models\Inventario;
use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $direccion = Direccion::create([
            'calle' => 'Carretera Mexicali-San Felipe',
            'exterior' => 'Numero
            1198',
            'interior' => '',
            'colonia' => 'Colonia Unión de Residentes
            Lázaro Cardenas',
            'CP' => 'C.P. 21383',
            'localidad' => 'Mexicali, BC',
        ]);

        $inventario = Inventario::create([
            'nombre'=> 'CAN - MEXICALI',
        ]);

        $direccion = Direccion::create([
            'calle' => 'Avenida Rapida Oriente',
            'exterior' => 'Número 16818',
            'interior' => '',
            'colonia' => 'Colonia Rio Tijuana 3ra Etapa',
            'CP' => ' C.P.
            22226',
            'localidad' => 'Tijuana, BC',
        ]);

        $inventario = Inventario::create([
            'nombre'=> 'CAN - TIJUANA',
        ]);
    }
}
