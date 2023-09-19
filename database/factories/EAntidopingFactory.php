<?php

namespace Database\Factories;

use App\Models\HistorialMedico;
use Illuminate\Database\Eloquent\Factories\Factory;

class EAntidopingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->dateTimeBetween('2023-08-01', '2023-08-31')->format('Y-m-d H:i:s'),
            'tipo' => $this->faker->text(8),
            'examen' => $this->faker->text(8),
            'historialMedico_id' => HistorialMedico::all()->random()->id,
        ];
    }
}
