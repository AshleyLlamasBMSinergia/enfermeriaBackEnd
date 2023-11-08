<?php

namespace Database\Factories;

use App\Models\Cita;
use App\Models\NomEmpleado;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cita = Cita::all()->random();

        return [
            'cita_id' => $cita->id,
            'fecha' => $cita->fecha,
            'profesional_id' => $cita->profesional_id,
            'pacientable_id' => NomEmpleado::all()->random()->id,
            'pacientable_type' => NomEmpleado::class,
            'triajeClasificacion' => rand(1,5),
            'presionDiastolica' => rand(80, 140),
            'frecuenciaRespiratoria' => rand(15,30),
            'frecuenciaCardiaca' => rand(80,140),
            'temperatura' => rand(35,40),
            'peso' => rand(60, 120),
            'talla' => (rand(145, 200)/100),
            'grucemiaCapilar'  => rand(100, 300),
            'subjetivo' => $this->faker->text($maxNbChars = 100),
            'objetivo' => $this->faker->text($maxNbChars = 100),
            'analisis' => $this->faker->text($maxNbChars = 100),
            'plan' => $this->faker->text($maxNbChars = 100),
            'diagnostico' => $this->faker->text($maxNbChars = 100),
            'receta' => $this->faker->text($maxNbChars = 100),
            'pronostico' => 'Favorable',
            'incapacidad' => false
        ];
    }
}
