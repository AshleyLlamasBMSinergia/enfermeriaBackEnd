<?php

namespace Database\Factories;

use App\Models\HistorialMedico;
use Illuminate\Database\Eloquent\Factories\Factory;

class EFisicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $n = 1;

        return [
            'fecha' => $this->faker->dateTimeBetween('2023-08-01', '2023-08-31')->format('Y-m-d H:i:s'),
            'TA' => $this->faker->text(8),
            'FR' => $this->faker->text(8),
            'peso' => rand(60, 120),
            'TC' => $this->faker->text(8),
            'temperatura' => rand(28, 34),
            'talla' => $this->faker->text(8),
            'estadoConciencia' => $this->faker->text(8),
            'coordinacion' => $this->faker->text(8),
            'equilibrio' => $this->faker->text(8),
            'marcha' => $this->faker->text(8),
            'orientacion' => $this->faker->text(8),
            'orientacionTiempo' => $this->faker->text(8),
            'orientacionPersona' => $this->faker->text(8),
            'orientacionEspacio' => $this->faker->text(8),
            'historialMedico_id' => HistorialMedico::all()->random()->id,
            'ECabeza_id' => $n,
            'ETorax_id' => $n,
            'EAbdomen_id' => $n,
            'EExtremidad_id' => $n,
            'EColumnaVertebral_id' => $n,
            'EOrganoSentido_id' => $n ++,
        ];
    }
}
