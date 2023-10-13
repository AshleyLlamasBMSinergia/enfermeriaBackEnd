<?php

namespace Database\Factories;

use App\Models\HistorialMedico;
use App\Models\Profesional;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tipo = $this->faker->randomElement(['Consulta', 'Psicólogo', 'Nutriólogo']);
        $color = $this->getColorByTipoCita($tipo);

        return [
            'fecha' => $this->faker->dateTimeBetween('2023-10-01', '2023-10-30')->format('Y-m-d H:i:s'),
            'tipo' => $tipo,
            'color' => $color,
            'motivo' => $this->faker->text($maxNbChars = 100),
            'paciente_id' => HistorialMedico::all()->random(),
            'profesional_id' => Profesional::all()->random()
        ];
    }

    private function getColorByTipoCita(string $tipo): string
    {
        switch ($tipo) {
            case 'Consulta':
                return '#13D52A';
            case 'Psicólogo':
                return '#EE3DF0';
            case 'Nutriólogo':
                return '#0080FF';
            default:
                return '#000000'; // Color predeterminado en caso de valor no válido
        }
    }
}
