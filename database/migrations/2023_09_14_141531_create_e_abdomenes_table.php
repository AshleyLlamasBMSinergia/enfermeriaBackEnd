<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEAbdomenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EAbdomenes', function (Blueprint $table) {
            $table->id();

            $table->string('pared')->nullable();
            $table->string('peristalsis')->nullable();
            $table->string('visceromegalias')->nullable();
            $table->string('hernias')->nullable();
            
            $table->longText('observaciones')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EAbdomenes');
    }
}
