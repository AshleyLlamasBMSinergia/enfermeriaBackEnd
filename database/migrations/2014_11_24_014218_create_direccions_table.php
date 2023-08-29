<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Direcciones', function (Blueprint $table) {
            $table->id();

            $table->string('calle')->nullable();
            $table->string('exterior')->nullable();
            $table->string('interior')->nullable();
            $table->string('colonia')->nullable();
            $table->string('CP')->nullable();
            $table->string('localidad')->nullable();

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
        Schema::dropIfExists('direccions');
    }
}
