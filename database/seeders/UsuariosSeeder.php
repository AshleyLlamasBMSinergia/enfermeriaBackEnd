<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuarios::factory(10)->create();
    }
}
