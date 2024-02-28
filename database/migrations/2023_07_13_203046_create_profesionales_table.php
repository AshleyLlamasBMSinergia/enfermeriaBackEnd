<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Profesionales', function (Blueprint $table) {
            $table->id();

            $table->string('nombre')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('cedula')->nullable();

            $table->integer('receta')->nullable();

            $table->unsignedBigInteger('direccion_id')->nullable();
            $table->foreign('direccion_id')->references('id')->on('Direcciones')->onDelete('set null')->onUpdate('cascade');
            
            $table->unsignedBigInteger('cedi_id')->nullable();
            $table->foreign('cedi_id')->references('id')->on('Cedis');

            $table->boolean('estatus')->nullable()->default(true);
            
            $table->unsignedBigInteger('puesto_id')->nullable();
            $table->foreign('puesto_id')->references('id')->on('NomPuestos')->onDelete('set null')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profesionals');
    }
}
