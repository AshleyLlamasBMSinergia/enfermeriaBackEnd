<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    public function up()
    {
        Schema::create('Movimientos', function (Blueprint $table) {
            $table->id();
            
            $table->dateTime('fecha');

            $table->unsignedBigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('Profesionales')->onDelete('set null')->onUpdate('cascade');


            $table->unsignedBigInteger('inventario_id')->nullable();
            $table->foreign('inventario_id')->references('id')->on('Inventarios')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('movimientoTipo_id')->nullable();
            $table->foreign('movimientoTipo_id')->references('id')->on('MovimientoTipos')->onDelete('set null')->onUpdate('cascade');

            // $table->unsignedBigInteger('aprobacion_id')->nullable();
            // $table->foreign('aprobacion_id')->references('id')->on('Aprobaciones');

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
        Schema::dropIfExists('Movimientos');
    }
}
