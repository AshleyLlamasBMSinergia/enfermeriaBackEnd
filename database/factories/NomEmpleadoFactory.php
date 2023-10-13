<?php

namespace Database\Factories;

use App\Models\NomPuesto;
use Illuminate\Database\Eloquent\Factories\Factory;

class NomEmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $n = 1;

        switch(rand(1,2)){
            case 1: $genero = 'F';
            break;
            case 2: $genero = 'M';
            break;
            default: $genero = null;
            break;
        }

        return [
            'nombre' => $this->faker->firstName(),
            'sexo' => $genero,
            'fechaNacimiento' => $this->faker->date('Y-m-d'),
            'estadoCivil' => 'Soltero',
            'telefono' => $this->faker->phoneNumber(),
            'direccion_id' => $n,
            'correo' => $this->faker->email(),
            'puesto_id' => NomPuesto::all()->random(),
        ];
    }
}
