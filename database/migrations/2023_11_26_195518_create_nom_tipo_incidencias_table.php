<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomTipoIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NomTipoIncidencias', function (Blueprint $table) {
            $table->string('TipoIncidencia')->primary();
            $table->string('Nombre')->nullable();
            $table->boolean('DamosVales')->nullable();
            $table->boolean('Vacaciones')->nullable();
            $table->boolean('Incapacidad')->nullable();
            $table->string('Tipo')->nullable();
            $table->string('PorCiento')->nullable();
            $table->string('RamaSeguro')->nullable();
            $table->string('Grupo')->nullable();
            $table->boolean('Ptu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NomTipoIncidencias');
    }
}
