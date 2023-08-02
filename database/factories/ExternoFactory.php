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
            'Paterno' => $paterno,
            'Materno' => $materno,
            'Nombres' => $nombre,
            'Sexo' => $genero,
            'FechaNacimiento' => $this->faker->date('Y-m-d'),
            'Telefono' => $this->faker->phoneNumber(),
            'Calle' => $this->faker->streetName(),
            'Exterior' => $this->faker->buildingNumber(),
            'Interior' => null,
            'Colonia' => $this->faker->name(),
            'CP' => $this->faker->postcode(),
            'Localidad' => $this->faker->state(),
            'Correo' => $this->faker->email(),
        ];
    }
}
