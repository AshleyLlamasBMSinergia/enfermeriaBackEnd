<?php

namespace Database\Factories;

use App\Models\Insumo;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lote' => $this->faker->numerify('###'),
            'fechaCaducidad' => $this->faker->dateTimeBetween('2023-09-01', '2024-06-31')->format('Y-m-d H:i:s'),
            'fechaIngreso' => $this->faker->dateTimeBetween('2023-09-01', '2024-06-31')->format('Y-m-d H:i:s'),
            'insumo_id' => Insumo::all()->random(),
            'piezasDisponibles' => $this->faker->randomDigitNotNull,
        ];
    }
}
