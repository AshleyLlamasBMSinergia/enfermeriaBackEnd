<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Horario;
use App\Models\Profesional;
use App\Models\User;
use Illuminate\Http\Request;

class TemporalController extends Controller
{
    public function generarUsuarios(){

        $usuarios = [
            5 => [
                'nombre' => 'Andres Sanchez Cano',
                'nick' => 'Andres Sanchez',
                'correo' => 'asanchez@bmsinergia.com',
                'contraseña' => '!4ndr32*$4'
            ],
            6 => [
                'nombre' => 'Salvador Yescas Sanchez',
                'nick' => 'Andres Sanchez',
                'correo' => 'syescas@bmsinergia.com',
                'contraseña' => '!!2Y32c42!!_S'
            ],
            7 => [
                'nombre' => 'Claudia Lizeth Garcia Rodriguez',
                'nick' => 'Claudia Sanchez',
                'correo' => 'cgarcia@bmsinergia.com',
                'contraseña' => '_!C14udi4&?'
            ],
        ];

        foreach($usuarios as $array){
            $profesional = Profesional::create([
                'nombre' => $array['nombre'],
                'correo' => $array['correo'],
                'cedi_id' => 1,
                'estatus' => true,
            ]);

            $profesional->inventarios()->attach(1);
    
            for( $i = 1; $i <= 5; $i++ ) {
                Horario::create([
                    'dia' => $i,
                    'entrada' => '15:00',
                    'salida' => '19:00',
                    'profesional_id' => $profesional->id,
                ]);
            }
    
            User::create([
                'name' => $array['nombre'],
                'nickname' => $array['nick'],
                'email' => $array['correo'],
                'password' => bcrypt($array['contraseña']),
                'useable_id' => $profesional->id,
                'useable_type' => Profesional::class,
            ]);
        }

    }
}
