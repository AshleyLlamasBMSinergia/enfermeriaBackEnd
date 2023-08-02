<?php

namespace Database\Factories;

use App\Models\HistorialMedico;
use App\Models\NomEmpleado;
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
            'Fecha' => $this->faker->dateTimeBetween('2023-08-01', '2023-08-31')->format('Y-m-d H:i:s'),
            'Tipo' => $tipo,
            'Color' => $color,
            'Motivo' => $this->faker->text($maxNbChars = 100),
            'Paciente' => HistorialMedico::all()->random(),
            'Profesional' => NomEmpleado::all()->random()
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
