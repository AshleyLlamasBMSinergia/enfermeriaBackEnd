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
            'nombre' => "$nombre $paterno $materno",
            'sexo' => $genero,
            'fechaNacimiento' => $this->faker->date('Y-m-d'),
            'estadoCivil' => 'Soltero',
            'telefono' => $this->faker->phoneNumber(),
            'direccion_id' => $n,
            'correo' => $this->faker->email(),
            'user_id' => $n ++,
            'puesto_id' => NomPuesto::all()->random(),
        ];
    }
}
