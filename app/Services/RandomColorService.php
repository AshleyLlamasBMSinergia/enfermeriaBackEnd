<?php

namespace App\Services;


class RandomColorService
{
    public function randomColor()
    {
        // Genera valores de color RGB aleatorios
        $red = mt_rand(0, 255);
        $green = mt_rand(0, 255);
        $blue = mt_rand(0, 255);

        // Devuelve el color en formato hexadecimal
        return sprintf("#%02x%02x%02x", $red, $green, $blue);
    }
}
