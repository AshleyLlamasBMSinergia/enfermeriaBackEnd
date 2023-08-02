<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Externos', function (Blueprint $table) {
            $table->id('Externo');

            $table->string('Paterno')->nullable();
            $table->string('Materno')->nullable();
            $table->string('Nombres')->nullable();

            $table->string('Sexo')->nullable();
            $table->date('FechaNacimiento')->nullable();
            $table->string('Telefono')->nullable();
            $table->string('Calle')->nullable();
            $table->string('Exterior')->nullable();
            $table->string('Interior')->nullable();
            $table->string('Colonia')->nullable();
            $table->string('CP')->nullable();
            $table->string('Localidad')->nullable();
            $table->string('Correo')->nullable();

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
        Schema::dropIfExists('Externos');
    }
}
