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

        User::factory(10)->create();

        Imagen::create([
            'url' => '352509003_6049771758454029_8179069290620608597_n.jpg',
            'categoria'  => 'fotografías',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\User'
        ]);
    }
}
