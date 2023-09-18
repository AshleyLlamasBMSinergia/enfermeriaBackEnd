<?php

namespace Database\Seeders;

use App\Models\EAbdomen;
use Illuminate\Database\Seeder;

class EAbdomenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EAbdomen::factory(20)->create();
    }
}
