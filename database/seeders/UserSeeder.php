<?php

namespace Database\Seeders;

use App\Models\Horario;
use App\Models\Imagen;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Joseline Ashley Llamas Garcia',
            'nickname' => 'Ashley Llamas',
            'email' => 'ashleyllamasg@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        Imagen::create([
            'url' => '352509003_6049771758454029_8179069290620608597_n.jpg',
            'categoria'  => 'fotografías',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\NomEmpleado'
        ]);

        Imagen::create([
            'url' => '352509003_6049771758454029_8179069290620608597_n.jpg',
            'categoria'  => 'fotografías',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\User'
        ]);

        // User::factory(10)->create();

        User::create([
            'name' => 'Bravo Canela Jose Omar',
            'nickname' => 'Jose Bravo',
            'email' => 'jbravo@bmsinergia.com',
            'password' => bcrypt('123456'),
        ]);

        Imagen::create([
            'url' => '2.jpeg',
            'categoria'  => 'fotografías',
            'imageable_id' => 2,
            'imageable_type' => 'App\Models\NomEmpleado'
        ]);

        User::create([
            'name' => 'Barreras Flores Jose Ramon',
            'nickname' => 'Jose Barreras',
            'email' => 'jbarreras@bmsinergia.com',
            'password' => bcrypt('123456'),
        ]);

        Imagen::create([
            'url' => '3.jpeg',
            'categoria'  => 'fotografías',
            'imageable_id' => 3,
            'imageable_type' => 'App\Models\NomEmpleado'
        ]);

        User::create([
            'name' => 'Leon Nava Raul Antonio',
            'nickname' => 'Raul Leon',
            'email' => 'rleon@bmsinergia.com',
            'password' => bcrypt('123456'),
        ]);

        Imagen::create([
            'url' => '4.jpeg',
            'categoria'  => 'fotografías',
            'imageable_id' => 4,
            'imageable_type' => 'App\Models\NomEmpleado'
        ]);

        User::create([
            'name' => 'Yescas Sanchez Salvador',
            'nickname' => 'Salvador Yescas',
            'email' => 'syescas@bmsinergia.com',
            'password' => bcrypt('123456'),
        ]);

        Imagen::create([
            'url' => '5.jpeg',
            'categoria'  => 'fotografías',
            'imageable_id' => 5,
            'imageable_type' => 'App\Models\NomEmpleado'
        ]);

        User::create([
            'name' => 'Galvez Magaña Delsy Rocio',
            'nickname' => 'Delsy Galvez',
            'email' => 'dgalvez@bmsinergia.com',
            'password' => bcrypt('123456'),
        ]);

        Imagen::create([
            'url' => '6.jpeg',
            'categoria'  => 'fotografías',
            'imageable_id' => 6,
            'imageable_type' => 'App\Models\NomEmpleado'
        ]);

        User::create([
            'name' => 'Sanchez Cano Andres',
            'nickname' => 'Andres Sanchez',
            'email' => 'asanchez@bmsinergia.com',
            'password' => bcrypt('123456'),
        ]);

        Imagen::create([
            'url' => '7.jpeg',
            'categoria'  => 'fotografías',
            'imageable_id' => 7,
            'imageable_type' => 'App\Models\NomEmpleado'
        ]);

        User::create([
            'name' => 'Garcia Rodriguez Claudia Lizeth',
            'nickname' => 'Claudia Garcia',
            'email' => 'cgarciaz@bmsinergia.com',
            'password' => bcrypt('123456'),
        ]);

        Imagen::create([
            'url' => '8.jpeg',
            'categoria'  => 'fotografías',
            'imageable_id' => 8,
            'imageable_type' => 'App\Models\NomEmpleado'
        ]);
    }
}
