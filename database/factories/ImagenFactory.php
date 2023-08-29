<?php

namespace Database\Factories;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ImagenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $n = 2;

        $imageUrl = 'https://www.webconsultas.com/sites/default/files/styles/wc_adaptive_image__small/public/articulos/perfil-resilencia.jpg';

        return [
            'url' => $imageUrl,
            'categoria'  => 'fotografías',
            'imageable_id' => $n ++,
            'imageable_type' => 'App\Models\User'
        ];
    }
}
