<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PendienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->text($maxNbChars = 6),
            'estatus' => $this->faker->boolean()
        ];
    }
}
