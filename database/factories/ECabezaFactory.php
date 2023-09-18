<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ECabezaFactory extends Factory
{
    public function definition()
    {
        return [
            'craneo' => $this->faker->text(8),
            'ojos' => $this->faker->text(8),
            'nariz' => $this->faker->text(8),
            'boca' => $this->faker->text(8),
            'cuello' => $this->faker->text(8),
            'observaciones' => $this->faker->text(8),
        ];
    }
}
