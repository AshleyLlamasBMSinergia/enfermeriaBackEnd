<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EAbdomenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pared' => $this->faker->text(8),
            'peristalsis' => $this->faker->text(8),
            'visceromegalias' => $this->faker->text(8),
            'hernias' => $this->faker->text(8),
            'observaciones' => $this->faker->text(8),
        ];
    }
}
