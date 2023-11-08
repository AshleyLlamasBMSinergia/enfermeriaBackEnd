<?php

namespace Database\Seeders;

use App\Models\Reactivo;
use Illuminate\Database\Seeder;

class ReactivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reactivo::create([
            "nombre"=> "Abacavir",
        ]);

        Reactivo::create([
            "nombre"=> "Acetazolamida",
        ]);

        Reactivo::create([
            "nombre"=> "Aceite Mineral",
        ]);

        Reactivo::create([
            "nombre"=> "Aciclovir",
        ]);

        Reactivo::create([
            "nombre"=> "Ácido acetilsalicílico",
        ]);

        Reactivo::create([
            "nombre"=> "Ácido ascórbico",
        ]);

        Reactivo::create([
            "nombre"=> "Ácido cromoglícico",
        ]);

        Reactivo::create([
            "nombre"=> "Ácido fólico",
        ]);

        Reactivo::create([
            "nombre"=> "Ácido ursodeoxicólico",
        ]);

        Reactivo::create([
            "nombre"=> "Ácido valproato",
        ]);

        Reactivo::create([
            "nombre"=> "Ácido zoledrónico",
        ]);

        Reactivo::create([
            "nombre"=> "Albendazol",
        ]);

        Reactivo::create([
            "nombre"=> "Albúmina Humana",
        ]);

        Reactivo::create([
            "nombre"=> "Alendronato",
        ]);

        Reactivo::create([
            "nombre"=> "Alopurinol",
        ]);

        Reactivo::create([
            "nombre"=> "Aluminio hidróxido",
        ]);
    }
}
