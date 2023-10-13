<?php

namespace Database\Factories;

use App\Models\EFisico;
use App\Models\NomEmpleado;
use App\Models\Profesional;
use App\Models\RHDependiente;
use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistorialMedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 1;
        static $clase = NomEmpleado::class;
        // static $clase = Profesional::class;

        // if($id == 2 && $clase == Profesional::class){
        //     $id = 1;
        //     $clase = NomEmpleado::class;
        // }

        if($id == 8 && $clase == NomEmpleado::class){
            $id = 1;
            $clase = RHDependiente::class;
        }

        return [
            'peso' => rand(60, 120),
            'talla' => (rand(145, 200)/100),
            'pacientable_id' => $id++,
            'pacientable_type' => $clase,
            'user_id' => User::all()->random()->id,
            //'APPatologicos_id' => $id++
        ];
    }
}
