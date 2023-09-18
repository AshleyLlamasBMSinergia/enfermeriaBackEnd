<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EExtremidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'toraxicas' => $this->faker->text(8),
            'hombro' => $this->faker->text(8),
            'codo' => $this->faker->text(8),
            'muneca' => $this->faker->text(8),
            'pie' => $this->faker->text(8),
            'movilidad' => $this->faker->text(8),
            'pelvicas' => $this->faker->text(8),
            'cadera' => $this->faker->text(8),
            'rodilla' => $this->faker->text(8),
            'tobillo' => $this->faker->text(8),
            'mano' => $this->faker->text(8),
            'fuerza' => $this->faker->text(8),
            'observaciones' => $this->faker->text(20),
        ];
    }
}
