<?php

namespace Database\Seeders;

use App\Models\MovimientoTipo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovimientoTipoSeeder extends Seeder
{
    public function run()
    {
        // DB::statement('SET IDENTITY_INSERT Profesionales ON');
        MovimientoTipo::create([
            "clave"=> 1,
            "tipoDeMovimiento"=> "DESPACHO POR RECETA",
            "afecta"=> -1,
        ]);

        MovimientoTipo::create([
            "clave"=> 7,
            "tipoDeMovimiento"=> "DESECHOS DE ALMACEN",
            "afecta"=> -1,
        ]);

        MovimientoTipo::create([
            "clave"=> 20,
            "tipoDeMovimiento"=> "COMPRAS",
            "afecta"=> 1,
        ]);

        MovimientoTipo::create([
            "clave"=> 100,
            "tipoDeMovimiento"=> "ENVIOS A MEXICALI",
            "afecta"=> -1,
        ]);

        MovimientoTipo::create([
            "clave"=> 101,
            "tipoDeMovimiento"=> "ENVIOS A TIJUANA",
            "afecta"=> -1,
        ]);

        MovimientoTipo::create([
            "clave"=> 102,
            "tipoDeMovimiento"=> "ENVIOS A SAN LUIS",
            "afecta"=> -1,
        ]);

        MovimientoTipo::create([
            "clave"=> 103,
            "tipoDeMovimiento"=> "ENVIOS A PEÑASCO",
            "afecta"=> -1,
        ]);

        MovimientoTipo::create([
            "clave"=> 104,
            "tipoDeMovimiento"=> "ENVIOS A CULIACAN",
            "afecta"=> -1,
        ]);

        MovimientoTipo::create([
            "clave"=> 107,
            "tipoDeMovimiento"=> "ENVIOS A ENSENADA",
            "afecta"=> -1,
        ]);

        MovimientoTipo::create([
            "clave"=> 108,
            "tipoDeMovimiento"=> "ENVIOS A MOCHIS-LEY",
            "afecta"=> -1,
        ]);

        MovimientoTipo::create([
            "clave"=> 110,
            "tipoDeMovimiento"=> "RECIBO DE MEXICALI",
            "afecta"=> 1,
        ]);

        MovimientoTipo::create([
            "clave"=> 111,
            "tipoDeMovimiento"=> "RECIBO DE TIJUANA",
            "afecta"=> 1,
        ]);


        MovimientoTipo::create([
            "clave"=> 112,
            "tipoDeMovimiento"=> "RECIBO DE SAN LUIS",
            "afecta"=> 1,
        ]);

        MovimientoTipo::create([
            "clave"=> 113,
            "tipoDeMovimiento"=> "RECIBO DE PEÑASCO",
            "afecta"=> 1,
        ]);

    }
}
