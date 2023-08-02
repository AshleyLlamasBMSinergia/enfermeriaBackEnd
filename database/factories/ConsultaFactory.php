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
            'Cita' => $cita->Cita,
            'Fecha' => $cita->Fecha,
            'Profesional' => $cita->Profesional,
            'Pacientable_id' => NomEmpleado::all()->random()->Empleado,
            'Pacientable_type' => NomEmpleado::class,
            'TriajeClasificacion' => rand(1,5),
            'PrecionDiastolica' => rand(80, 140),
            'FrecuenciaRespiratoria' => rand(15,30),
            'FrecuenciaCardiaca' => rand(80,140),
            'Temperatura' => rand(35,40),
            'Peso' => rand(60, 120),
            'Talla' => (rand(145, 200)/100),
            'GrucemiaCapilar'  => rand(100, 300),
            'Subjetivo' => $this->faker->text($maxNbChars = 100),
            'Objetivo' => $this->faker->text($maxNbChars = 100),
            'Analisis' => $this->faker->text($maxNbChars = 100),
            'Plan' => $this->faker->text($maxNbChars = 100),
            'Diagnostico' => $this->faker->text($maxNbChars = 100),
            'Receta' => $this->faker->text($maxNbChars = 100),
            'Pronostico' => 'Favorable',
            'Incapacidad' => false
        ];
    }
}
