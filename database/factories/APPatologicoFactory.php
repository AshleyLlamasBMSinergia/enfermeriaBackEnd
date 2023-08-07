<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class APPatologicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Cirujias' => 'Si',
            //Esp de especificar
            'EspCirujias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Contusiones' => 'Si',
            'EspContusiones' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Lumbalgias' => 'Si',
            'EspLumbalgias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Hernias' => 'Si',
            'EspHernias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Fracturas' => 'Si',
            'EspFracturas' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Dorsalgias' => 'Si',
            'EspDorsalgias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Hospitalizaciones' => 'Si',
            'EspHospitalizaciones' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Esguinces' => 'Si',
            'EspEsguinces' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'LesionesArteriales' => 'Si',
            'EspLesionesArteriales' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Transfusiones' => 'Si',
            'EspTransfusiones' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Luxaciones' => 'Si',
            'EspLuxaciones' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Tetanias' => 'Si',
            'EspTetanias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Alergias' => 'Si',
            'EspAlergias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'Asma' => 'No',
            'Epilepsia' => 'No',

            //Enf de enfermedades
            'EnfDentales' => 'Si',
            'EspEnfDentales' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'EnfOpticas' => 'Si',
            'EspEnfOpticas' => $this->faker->text($maxNbChars = (rand(5, 8))),

            //Alt de alteraciones
            'AltPsicologicas' => 'Si',
            'EspAltPsicologicas' => $this->faker->text($maxNbChars = (rand(5, 8))),
        ];
    }
}
