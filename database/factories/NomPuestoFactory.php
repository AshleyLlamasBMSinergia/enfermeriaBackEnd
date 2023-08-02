<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NomPuestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nombre' => $this->faker->jobTitle(),
        ];
    }
}
