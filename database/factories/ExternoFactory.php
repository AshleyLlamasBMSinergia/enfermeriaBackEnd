<?php

namespace Database\Factories;

use App\Models\NomEmpleado;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExternoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $paterno = $this->faker->lastName();
        $materno = $this->faker->lastName();
        $nombre = $this->faker->firstName();

        switch(rand(1,2)){
            case 1: $genero = 'F';
            break;
            case 2: $genero = 'M';
            break;
            default: $genero = null;
            break;
        }

        return [
            'paterno' => $paterno,
            'materno' => $materno,
            'Nombre' => $nombre,
            'sexo' => $genero,
            'fechaNacimiento' => $this->faker->date('Y-m-d'),
            'telefono' => $this->faker->phoneNumber(),
            'direccion_id' => null,
            'correo' => $this->faker->email(),
        ];
    }
}
