<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EToraxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'camposPulmonares' => $this->faker->text(8),
            'ampAmplex' => $this->faker->text(8),
            'ruidoPulmonar' => $this->faker->text(8),
            'transVoz' => $this->faker->text(8),
            'areaPrecordial' => $this->faker->text(8),
            'FC' => $this->faker->text(8),
            'tono' => $this->faker->text(8),
            'ritmo' => $this->faker->text(8),
            'observaciones' => $this->faker->text(14),
        ];
    }
}
