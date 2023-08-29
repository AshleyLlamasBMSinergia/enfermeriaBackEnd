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
            'cirujias' => 'Si',
            //Esp de especificar
            'espCirujias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'contusiones' => 'Si',
            'espContusiones' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'lumbalgias' => 'Si',
            'espLumbalgias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'hernias' => 'Si',
            'espHernias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'fracturas' => 'Si',
            'espFracturas' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'dorsalgias' => 'Si',
            'espDorsalgias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'hospitalizaciones' => 'Si',
            'espHospitalizaciones' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'esguinces' => 'Si',
            'espEsguinces' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'lesionesArteriales' => 'Si',
            'espLesionesArteriales' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'transfusiones' => 'Si',
            'espTransfusiones' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'luxaciones' => 'Si',
            'espLuxaciones' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'tetanias' => 'Si',
            'espTetanias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'alergias' => 'Si',
            'espAlergias' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'asma' => 'No',
            'epilepsia' => 'No',

            //Enf de enfermedades
            'enfDentales' => 'Si',
            'espEnfDentales' => $this->faker->text($maxNbChars = (rand(5, 8))),

            'enfOpticas' => 'Si',
            'espEnfOpticas' => $this->faker->text($maxNbChars = (rand(5, 8))),

            //Alt de alteraciones
            'altPsicologicas' => 'Si',
            'espAltPsicologicas' => $this->faker->text($maxNbChars = (rand(5, 8))),
        ];
    }
}
