<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRHDependientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RHDependientes', function (Blueprint $table) {
            $table->id('Dependiente');

            $table->unsignedBigInteger('Empleado')->nullable();
            $table->foreign('Empleado')->references('Empleado')->on('NomEmpleados')->onDelete('set null')->onUpdate('cascade');

            $table->string('Paterno')->nullable();
            $table->string('Materno')->nullable();
            $table->string('Nombres')->nullable();
            $table->dateTime('Nacimiento')->nullable();
            $table->string('Sexo')->nullable();
            $table->string('Parentesco')->nullable();
            $table->string('Status')->nullable();
            $table->boolean('Beneficiario')->nullable();

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
        Schema::dropIfExists('RHDependientes');
    }
}
