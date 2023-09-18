<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EColumnaVertebralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lordosis' => $this->faker->text(8),
            'flexion' => $this->faker->text(8),
            'lateralizacion' => $this->faker->text(8),
            'puntosDolor' => $this->faker->text(8),
            'xifosis' => $this->faker->text(8),
            'extension' => $this->faker->text(8),
            'rotacion' => $this->faker->text(8),
            'otros' => $this->faker->text(8),
            'observaciones' => $this->faker->text(12),
        ];
    }
}
