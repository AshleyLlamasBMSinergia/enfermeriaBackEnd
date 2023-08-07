<?php

namespace Database\Factories;

use App\Models\NomEmpleado;
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
        static $usuarioId = 1;

        static $id = 1;

        return [
            'pacientable_id' => $id++,
            'pacientable_type' => NomEmpleado::class,
            'Usuario' => Usuarios::all()->random()->Usuario,
            //'APPatologicos' => $id++
        ];
    }
}
