<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EOrganoSentidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vista' => $this->faker->text(8),
            'oido' => $this->faker->text(8),
            'olfato' => $this->faker->text(8),
            'tacto' => $this->faker->text(8),
            'observaciones' => $this->faker->text(20),
        ];
    }
}
