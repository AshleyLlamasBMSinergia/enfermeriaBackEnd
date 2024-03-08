<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentesTable extends Migration
{
    public function up()
    {
        Schema::create('Accidentes', function (Blueprint $table) {
            $table->id();
            
            $table->dateTime('fecha')->nullable();

            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('NomEmpleados')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id')->references('id')->on('Departamentos');

            $table->string('lugar')->nullable();

            $table->longText('descripcion')->nullable();

            $table->unsignedBigInteger('diagnostico_id')->nullable(); 
            $table->foreign('diagnostico_id')->references('id')->on('Diagnosticos')->onDelete('set null')->onUpdate('cascade');

            $table->string('causa')->nullable();
            $table->string('canalizado')->nullable();
            $table->string('clinica')->nullable();
            $table->integer('diasIncInterna')->nullable();
            $table->float('costoIncInterna')->nullable();
            $table->float('costoEstudio')->nullable();
            $table->float('costoConsulta')->nullable();
            $table->float('costoMedicamento')->nullable();
            $table->float('costoTotalAccidente')->nullable();
            $table->boolean('incIMSS')->nullable();
            $table->integer('diasIncIMSS')->nullable();
            $table->boolean('altaST2')->nullable();
            $table->boolean('calificacion')->nullable();
            
            $table->longText('observaciones')->nullable();
            $table->longText('resultado')->nullable();

            $table->string('antiguedad')->nullable();
            $table->string('turno')->nullable();
            $table->float('salario')->nullable();

            $table->unsignedBigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('Profesionales');

            $table->unsignedBigInteger('incapacidad_id')->nullable();
            $table->foreign('incapacidad_id')->references('id')->on('Incapacidades');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Accidentes');
    }
}
