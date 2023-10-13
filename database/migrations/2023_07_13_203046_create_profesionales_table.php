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

            $table->unsignedBigInteger('direccion_id')->nullable();
            $table->foreign('direccion_id')->references('id')->on('Direcciones')->onDelete('set null')->onUpdate('cascade');

            $table->string('estatus')->nullable();
            
            $table->unsignedBigInteger('puesto_id')->nullable();
            $table->foreign('puesto_id')->references('id')->on('NomPuestos')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('Empresas')->onDelete('set null')->onUpdate('cascade');
            
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
        Schema::dropIfExists('profesionals');
    }
}
