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
        $direccion = Direccion::create([
            'calle' => 'Carretera Mexicali-San Felipe',
            'exterior' => 'Numero 1198',
            'interior' => null,
            'colonia' => 'Colonia Unión de Residentes Lázaro Cardenas',
            'CP' => 'C.P. 21383',
            'localidad_id' => 1,
        ]);


        //1
        Cedi::create([
            'nombre' => 'Mexicali',
            'empresa_id' => 1,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Avenida Rapida Oriente',
            'exterior' => 'Número 16818',
            'interior' => null,
            'colonia' => 'Colonia Rio Tijuana 3ra Etapa',
            'CP' => 'C.P. 22226',
            'localidad_id' => 89,
        ]);

        //2
        Cedi::create([
            'nombre' => 'Tijuana',
            'empresa_id' => 1,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Avenida De La Transformacion',
            'exterior' => null,
            'interior' => null,
            'colonia' => 'Colonia Burócrata',
            'CP' => 'C.P. 83450',
            'localidad_id' => 104,
        ]);

        //3
        Cedi::create([
            'nombre' => 'San Luis',
            'empresa_id' => 1,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Avenida Cuauhtemoc',
            'exterior' => 'Número 296',
            'interior' => null,
            'colonia' => 'Colonia López Portillo',
            'CP' => 'C.P. 83552',
            // 'localidad_id' => 108,
        ]);

        //4
        Cedi::create([
            'nombre' => 'Peñasco',
            'empresa_id' => 1,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Calle Melchor Diaz',
            'exterior' => 'Número 5080',
            'interior' => null,
            'colonia' => 'Colonia San Rafael',
            'CP' => 'C.P. 80150',
            'localidad_id' => 98,
        ]);

        //5
        Cedi::create([
            'nombre' => 'Los Mochis',
            'empresa_id' => 1,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Avenida Rapida Oriente',
            'exterior' => 'Número 16818',
            'interior' => null,
            'colonia' => 'Colonia Rio Tijuana 3ra Etapa',
            'CP' => 'C.P. 22226',
            'localidad_id' => 89,
        ]);

        //6
        Cedi::create([
            'nombre' => 'Ensenada',
            'empresa_id' => 1,
            'direccion_id' => $direccion->id
        ]);

        //AQUI TERMINA CAN Y COMIENSA SBM
        $direccion = Direccion::create([
            'calle' => 'Valle del Colorado',
            'exterior' => '1096',
            'interior' => 'A',
            'colonia' => 'Jardines del Valle',
            'CP' => '21270',
            'localidad_id' => 16,
        ]);

        //7
        Cedi::create([
            'nombre' => 'Mexicali',
            'empresa_id' => 12,
            'direccion_id' => $direccion->id
        ]);

        $direccion = Direccion::create([
            'calle' => 'Norman E. Borlaug Esq. Calle 300',
            'exterior' => 'No. 85098',
            'interior' => null,
            'colonia' => 'Col. La Misión',
            'CP' => 'C.P. 85098',
            // 'localidad_id' => 108,
        ]);

        //8
        Cedi::create([
            'nombre' => 'Sonora (Beloved)',
            'empresa_id' => 12,
            'direccion_id' => $direccion->id
        ]);

        //TERMINA SBM Y COMIENZA FCO
        $direccion = Direccion::create([
            'calle' => 'Valle del Colorado',
            'exterior' => '1096',
            'interior' => 'A',
            'colonia' => 'Jardines del Valle',
            'CP' => '21270',
            'localidad_id' => 16,
        ]);

        //9
        Cedi::create([
            'nombre' => 'Mexicali',
            'empresa_id' => 5,
            'direccion_id' => $direccion->id
        ]);

        // //TERMINA FCO Y EMPIEZA ENV
        // $direccion = Direccion::create([
        //     'calle' => 'TALLERES',
        //     'exterior' => '2185',
        //     'interior' => null,
        //     'colonia' => 'PARQUE INDUSTRIAL',
        //     'CP' => null,
        //     'localidad_id' => 107,
        // ]);

        // //10
        // Cedi::create([
        //     'nombre' => 'Obregon',
        //     'empresa_id' => 5,
        //     'direccion_id' => $direccion->id
        // ]);

        // //TERMINA ENV Y EMPIEZA CYSA
        // $direccion = Direccion::create([
        //     'calle' => 'Norman E. Borlaug Esq. Calle 300',
        //     'exterior' => null,
        //     'interior' => null,
        //     'colonia' => 'Col. La Misión',
        //     'CP' => 'C.P. 85098',
        //     'localidad_id' => 107,
        // ]);

        // //11
        // Cedi::create([
        //     'nombre' => 'Obregon',
        //     'empresa_id' => 3,
        //     'direccion_id' => $direccion->id
        // ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Calle De La Plata  (Esq. Con Viñedos)',
        //     'exterior' => 'No.372',
        //     'interior' => null,
        //     'colonia' => null,
        //     'CP' => 'CP. 21385',
        //     'localidad_id' => 100,
        // ]);

        // //12
        // Cedi::create([
        //     'nombre' => 'Hermosillo',
        //     'empresa_id' => 3,
        //     'direccion_id' => $direccion->id
        // ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Carretera Internacional Km. 1781 Sur Zona Industrial',
        //     'exterior' => null,
        //     'interior' => null,
        //     'colonia' => null,
        //     'CP' => 'CP. 85800',
        //     'localidad_id' => null,
        // ]);

        // //13
        // Cedi::create([
        //     'nombre' => 'Navojoa',
        //     'empresa_id' => 3,
        //     'direccion_id' => $direccion->id
        // ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Av. Luis Donaldo Colosio',
        //     'exterior' => '#2453',
        //     'interior' => null,
        //     'colonia' => 'Col. John F. Kennedy',
        //     'CP' => 'C.P. 84065',
        //     'localidad_id' => 101,
        // ]);

        // //14
        // Cedi::create([
        //     'nombre' => 'Nogales',
        //     'empresa_id' => 3,
        //     'direccion_id' => $direccion->id
        // ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Av. Melchor Ocampo',
        //     'exterior' => '#104',
        //     'interior' => null,
        //     'colonia' => 'Col. Los Arcos',
        //     'CP' => 'C.P. 84600',
        //     'localidad_id' => 99,
        // ]);

        // //15
        // Cedi::create([
        //     'nombre' => 'Caborca',
        //     'empresa_id' => 3,
        //     'direccion_id' => $direccion->id
        // ]);

        // $direccion = Direccion::create([
        //     'calle' => 'Norman E. Borlaug Esq. Calle 300',
        //     'exterior' => null,
        //     'interior' => null,
        //     'colonia' => 'Col. La Misión',
        //     'CP' => 'C.P. 85098.',
        //     'localidad_id' => 107,
        // ]);

        // //16
        // Cedi::create([
        //     'nombre' => 'Guaymas',
        //     'empresa_id' => 3,
        //     'direccion_id' => $direccion->id
        // ]);

        // //TERMINA CYSA Y EMPIEZA BEL
        // $direccion = Direccion::create([
        //     'calle' => 'CR NORMAN E BORLAUG',
        //     'exterior' => null,
        //     'interior' => null,
        //     'colonia' => 'LA MISION',
        //     'CP' => null,
        //     'localidad_id' => 107,
        // ]);

        // //17
        // Cedi::create([
        //     'nombre' => 'Obregon',
        //     'empresa_id' => 13,
        //     'direccion_id' => $direccion->id
        // ]);
    }
}
