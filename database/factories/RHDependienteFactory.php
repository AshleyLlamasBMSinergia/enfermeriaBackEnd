<?php

namespace Database\Factories;

use App\Models\NomEmpleado;
use Illuminate\Database\Eloquent\Factories\Factory;

class RHDependienteFactory extends Factory
{
    public function definition()
    {
        switch(rand(1,2)){
            case 1: $genero = 'F';
            break;
            case 2: $genero = 'M';
            break;
            default: $genero = null;
            break;
        }

        switch(rand(1,3)){
            case 1: $parentesco = 'Padre';
            break;
            case 2: $parentesco = 'Hijo';
            break;
            case 3: $parentesco = 'Hermano';
            break;
            default: $parentesco = null;
            break;
        }

        return [
            'empleado_id' => NomEmpleado::all()->random(),
            'nombre' => $this->faker->firstName(),
            'sexo' => $genero,
            'fechaNacimiento' => $this->faker->date('Y-m-d'),
            'parentesco' => $parentesco,
        ];
    }
}
