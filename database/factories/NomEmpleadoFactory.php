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
        static $usuarioId = 1;

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
            'Nombre' => "$nombre $paterno $materno",
            'Sexo' => $genero,
            'FechaNacimiento' => $this->faker->date('Y-m-d'),
            'EstadoCivil' => 'Soltero',
            'Telefono' => $this->faker->phoneNumber(),
            'Calle' => $this->faker->streetName(),
            'Exterior' => $this->faker->buildingNumber(),
            'Interior' => null,
            'Colonia' => $this->faker->name(),
            'CP' => $this->faker->postcode(),
            'Localidad' => $this->faker->state(),
            'Correo' => $this->faker->email(),
            'Usuario' => $usuarioId ++,
            'Puesto' => NomPuesto::all()->random(),
            'FechaIngreso' => $this->faker->date('Y-m-d'),
            'Escolaridad' => 'Nivel superior'
        ];
    }
}
