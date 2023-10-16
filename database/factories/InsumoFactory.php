<?php

namespace Database\Factories;

use App\Models\Inventario;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsumoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'precio' => $this->faker->randomDigitNotNull,
            'piezasPorLote' => $this->faker->randomDigitNotNull,
            'descripcion' => $this->faker->text($maxNbChars = 100),
            'inventario_id' => Inventario::all()->random()->id,
        ];
    }
}
