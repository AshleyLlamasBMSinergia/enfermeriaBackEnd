<?php

namespace Database\Seeders;

use App\Models\EVista;
use Illuminate\Database\Seeder;

class EVistaSeeder extends Seeder
{
    public function run()
    {
        EVista::factory(15)->create();
    }
}
