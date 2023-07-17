<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        static $id = 1;

        return [
            'Usuario' => $id++,
            'Nombre' => $this->faker->name,
            'Password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'Nivel' => rand(1,2),
            'Plaza' => rand(1,4),
            'Bloqueo' => rand(0,1),
            'Admin' => rand(0,1),
            'Gerente' => $this->faker->bothify('#####'),
            'Correo' => $this->faker->unique()->safeEmail,
            'CedulaProfesional' => null
        ];
    }
}
