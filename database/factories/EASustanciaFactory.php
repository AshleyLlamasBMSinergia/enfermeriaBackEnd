<?php

namespace Database\Factories;

use App\Models\EAntidoping;
use Illuminate\Database\Eloquent\Factories\Factory;

class EASustanciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sustancia' => $this->faker->text(8),
            'resultado' => $this->faker->text(8),
            'EAntidoping_id' => EAntidoping::all()->random()->id,
        ];
    }
}
