<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncapacidadZonaAfectadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incapacidad_zona_afectada', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('incapacidad_id')->nullable();
            $table->foreign('incapacidad_id')->references('id')->on('Incapacidades')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('zona_afectada_id')->nullable();
            $table->foreign('zona_afectada_id')->references('id')->on('ZonasAfectadas')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('incapacidad_zona_afectada');
    }
}
