<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Revisiones', function (Blueprint $table) {
            $table->id();

            $table->string('tipo');

            $table->unsignedBigInteger('incapacidad_id')->nullable();
            $table->foreign('incapacidad_id')->references('id')->on('Incapacidades')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('Profesionales');

            $table->longText('diagnostico')->nullable();

            $table->date('fecha')->nullable();
            $table->integer('dias')->nullable();

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
        Schema::dropIfExists('Revisiones');
    }
}
