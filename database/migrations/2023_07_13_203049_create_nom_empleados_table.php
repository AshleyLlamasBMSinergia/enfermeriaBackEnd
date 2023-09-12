<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNomEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NomEmpleados', function (Blueprint $table) {
            $table->id();

            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('nombre')->nullable();
            $table->string('RFC')->nullable();
            $table->string('curp')->nullable();
            $table->string('IMSS')->nullable();
            $table->string('sexo')->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->string('estadoCivil')->nullable();
            $table->string('telefono')->nullable();

            $table->string('correo')->nullable();

            $table->unsignedBigInteger('direccion_id')->nullable();
            $table->foreign('direccion_id')->references('id')->on('Direcciones')->onDelete('set null')->onUpdate('cascade');

            $table->string('estatus')->nullable();
            
            $table->unsignedBigInteger('puesto_id')->nullable();
            $table->foreign('puesto_id')->references('id')->on('NomPuestos')->onDelete('set null')->onUpdate('cascade');
            
            $table->smallInteger('clinica')->nullable();
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            
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
        Schema::dropIfExists('NomEmpleados');
    }
}
