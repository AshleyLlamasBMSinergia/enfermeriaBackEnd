<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    public function run()
    {
        Empresa::create([
            'id' => 1,
            'RFC' => 'CAN121023NG2',
            'Nombre' => 'CAN',
            'NombreLargo' => 'COMERCIALIZADORA AGROINDUSTRIAL DEL NORTE',
            'Path' => '172.16.80.2\SQLSVR|RecursosHumanosCAN',
            'Path2' => '25.63.56.136\SQLSVR|RecursosHumanosCAN',
        ]);

        Empresa::create([
            'id' => 2,
            'RFC' => 'CVN140812CQ9',
            'Nombre' => 'CVN',
            'NombreLargo' => 'COMERCIALIZADORA VALLE DEL NORTE ',
            'Path' => '172.16.80.2\SQLSVR|RecursosHumanosCVN',
            'Path2' => '25.63.56.136\SQLSVR|RecursosHumanosCVN',
        ]);

        Empresa::create([
            'id' => 5,
            'RFC' => 'EEZ170707LP6',
            'Nombre' => 'ENV',
            'NombreLargo' => 'ENVASES ESPECIALIZADOS',
            'Path' => '172.16.80.2\SQLSVR|RecursosHumanosENV',
            'Path2' => '25.63.56.136\SQLSVR|RecursosHumanosENV',
        ]);

        Empresa::create([
            'id' => 11,
            'RFC' => 'FCO220526DF0',
            'Nombre' => 'FCO',
            'NombreLargo' => 'FROZEN COW',
            'Path' => '172.16.80.2\SQLSVR|RecursosHumanosFCO',
            'Path2' => '25.63.56.136\SQLSVR|RecursosHumanosFCO',
        ]);

        Empresa::create([
            'id' => 12,
            'RFC' => 'SBM220526P31',
            'Nombre' => 'SBM',
            'NombreLargo' => 'SINERGIA',
            'Path' => '172.16.80.2\SQLSVR|RecursosHumanosSBM',
            'Path2' => '25.63.56.136\SQLSVR|RecursosHumanosSBM',
        ]);
    }
}
