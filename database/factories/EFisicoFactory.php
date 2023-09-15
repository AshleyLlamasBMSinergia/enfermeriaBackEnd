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
        return [
            'fecha' => $this->faker->dateTimeBetween('2023-08-01', '2023-08-31')->format('Y-m-d H:i:s'),
            'TA' => $this->faker->text($maxNbChars = 8),
            'FR' => $this->faker->text($maxNbChars = 8),
            'peso' => rand(60, 120),
            'TC' => $this->faker->text($maxNbChars = 8),
            'temperatura' => rand(28, 34),
            'talla' => $this->faker->text($maxNbChars = 8),
            'estadoConciencia' => $this->faker->text($maxNbChars = 8),
            'coordinacion' => $this->faker->text($maxNbChars = 8),
            'equilibrio' => $this->faker->text($maxNbChars = 8),
            'marcha' => $this->faker->text($maxNbChars = 8),
            'orientacion' => $this->faker->text($maxNbChars = 8),
            'orientacionTiempo' => $this->faker->text($maxNbChars = 8),
            'orientacionPersona' => $this->faker->text($maxNbChars = 8),
            'orientacionEspacio' => $this->faker->text($maxNbChars = 8),
            'historialMedico_id' => HistorialMedico::all()->random()->id,
            // 'EOrganoSentido_id',
            // 'ECabeza_id',
            // 'ETorax_id',
            // 'EAbdomen_id',
            // 'EExtremidad_id',
            // 'EColumnaVertebral_id',
        ];
    }
}
