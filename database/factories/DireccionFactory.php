<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'calle' => $this->faker->streetName(),
            'exterior' => $this->faker->buildingNumber(),
            'interior' => null,
            'colonia' => $this->faker->name(),
            'CP' => $this->faker->postcode(),
            'localidad' => $this->faker->state(),
        ];
    }
}
