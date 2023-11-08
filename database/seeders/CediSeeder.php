<?php

namespace Database\Seeders;

use App\Models\Cedi;
use App\Models\Direccion;
use Illuminate\Database\Seeder;

class CediSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cedi::create([
            "nombre" => "CAN",
        ]);

        Cedi::create([
            "nombre" => "CYSA",
        ]);
    }
}
