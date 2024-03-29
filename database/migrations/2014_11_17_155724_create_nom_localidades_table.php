<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomLocalidadesTable extends Migration
{
    public function up()
    {
        Schema::create('NomLocalidades', function (Blueprint $table) {
            $table->id();

            $table->string('localidad');
            $table->string('nombre');
            $table->string('clave');
            $table->string('municipio');

            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id')->references('id')->on('NomEstados')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('NomLocalidades');
    }
}
