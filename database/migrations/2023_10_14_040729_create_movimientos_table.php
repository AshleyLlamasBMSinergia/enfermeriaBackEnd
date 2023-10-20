<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo')->nullable();
            $table->string('folio')->nullable();
            $table->dateTime('fecha');

            $table->unsignedBigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('Profesionales')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('lote_id')->nullable();
            $table->foreign('lote_id')->references('id')->on('Lotes')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('typable_id');
            $table->string('typable_type');

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
        Schema::dropIfExists('movimientos');
    }
}
