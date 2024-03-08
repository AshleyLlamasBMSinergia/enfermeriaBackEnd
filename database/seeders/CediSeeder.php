<?php

namespace Database\Seeders;

use App\Models\Cedi;
use App\Models\Direccion;
use Illuminate\Database\Seeder;

class CediSeeder extends Seeder
{
    public function run()
    {
        //CEDIS CAN
        // $direccion = Direccion::create([
        //     'calle' => 'Carretera Mexicali-San Felipe',
        //     'exterior' => 'Numero 1198',
        //     'interior' => null,
        //     'colonia' => 'Colonia Unión de Residentes Lázaro Cardenas',
        //     'CP' => 'C.P. 21383',
        //     'localidad_id' => 1,
        // ]);


        //1
        Cedi::create([
            'nombre' => 'Mexicali',
            'empresa_id' => 1,
            // 'direccion_id' => $direccion->id
        ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Avenida Rapida Oriente',
        //     'exterior' => 'Número 16818',
        //     'interior' => null,
        //     'colonia' => 'Colonia Rio Tijuana 3ra Etapa',
        //     'CP' => 'C.P. 22226',
        //     'localidad_id' => 89,
        // ]);

        //2
        Cedi::create([
            'nombre' => 'Tijuana',
            'empresa_id' => 1,
            // 'direccion_id' => $direccion->id
        ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Avenida De La Transformacion',
        //     'exterior' => null,
        //     'interior' => null,
        //     'colonia' => 'Colonia Burócrata',
        //     'CP' => 'C.P. 83450',
        //     'localidad_id' => 104,
        // ]);

        //3
        Cedi::create([
            'nombre' => 'San Luis',
            'empresa_id' => 1,
            // 'direccion_id' => $direccion->id
        ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Avenida Cuauhtemoc',
        //     'exterior' => 'Número 296',
        //     'interior' => null,
        //     'colonia' => 'Colonia López Portillo',
        //     'CP' => 'C.P. 83552',
        //     'localidad_id' => 108,
        // ]);

        //4
        Cedi::create([
            'nombre' => 'Peñasco',
            'empresa_id' => 1,
            // 'direccion_id' => $direccion->id
        ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Calle Melchor Diaz',
        //     'exterior' => 'Número 5080',
        //     'interior' => null,
        //     'colonia' => 'Colonia San Rafael',
        //     'CP' => 'C.P. 80150',
        //     'localidad_id' => 98,
        // ]);

        //5
        Cedi::create([
            'nombre' => 'Los Mochis',
            'empresa_id' => 1,
            // 'direccion_id' => $direccion->id
        ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Avenida Rapida Oriente',
        //     'exterior' => 'Número 16818',
        //     'interior' => null,
        //     'colonia' => 'Colonia Rio Tijuana 3ra Etapa',
        //     'CP' => 'C.P. 22226',
        //     'localidad_id' => 89,
        // ]);

        //6
        Cedi::create([
            'nombre' => 'Ensenada',
            'empresa_id' => 1,
            // 'direccion_id' => $direccion->id
        ]);

        //AQUI TERMINA CAN Y COMIENSA SBM
        // $direccion = Direccion::create([
        //     'calle' => 'Valle del Colorado',
        //     'exterior' => '1096',
        //     'interior' => 'A',
        //     'colonia' => 'Jardines del Valle',
        //     'CP' => '21270',
        //     'localidad_id' => 16,
        // ]);

        //7
        Cedi::create([
            'nombre' => 'Mexicali',
            'empresa_id' => 12,
            // 'direccion_id' => $direccion->id
        ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Norman E. Borlaug Esq. Calle 300',
        //     'exterior' => 'No. 85098',
        //     'interior' => null,
        //     'colonia' => 'Col. La Misión',
        //     'CP' => 'C.P. 85098',
        //     'localidad_id' => 108,
        // ]);

        //8
        Cedi::create([
            'nombre' => 'Sonora (Beloved)',
            'empresa_id' => 12,
            // 'direccion_id' => $direccion->id
        ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Valle del Colorado',
        //     'exterior' => '1096',
        //     'interior' => 'A',
        //     'colonia' => 'Jardines del Valle',
        //     'CP' => '21270',
        //     'localidad_id' => 16,
        // ]);

        //9
        Cedi::create([
            'nombre' => 'Mexicali',
            'empresa_id' => 11,
            // 'direccion_id' => $direccion->id
        ]);
    }
}
