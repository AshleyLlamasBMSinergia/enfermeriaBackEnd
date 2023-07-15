<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Consultas', function (Blueprint $table) {
            $table->id('Consulta');

            //DATOS DE LA CITA
            $table->unsignedBigInteger('Cita')->nullable(); 
            $table->foreign('Cita')->references('Cita')->on('Citas')->onDelete('set null')->onUpdate('cascade');

            $table->dateTime('Fecha');
            
            //ENFERMERO - DOCTOR
            $table->unsignedBigInteger('Profesional')->nullable();
            $table->foreign('Profesional')->references('Empleado')->on('NomEmpledos');

            //PACIENTE
            $table->unsignedBigInteger('Pacientable')->nullable();// PACIENTE - ID TIPO
            $table->string('PacientableType')->nullable();// PACIENTE - TIPO

            //SIGNOS VITALES E INFORMACION DEL PACIENTE
            $table->time('TriajeClasificacion')->nullable();
            $table->smallInteger('PrecionDiastolica')->nullable();
            $table->smallInteger('FrecuenciaRespiratoria')->nullable();
            $table->smallInteger('FrecuenciaCardiaca')->nullable();
            $table->smallInteger('Temperatura')->nullable();
            $table->smallInteger('Peso')->nullable();
            $table->decimal('Talla')->nullable();
            $table->decimal('GrucemiaCapilar')->nullable();

            //SOAP
            $table->longText('Subjetivo')->nullable();
            $table->longText('Objetivo')->nullable();
            $table->longText('Analisis')->nullable();
            $table->longText('Plan')->nullable();

            //RECETA
            $table->longText('Diagnostico')->nullable();
            $table->longText('Receta')->nullable();

            //INCAPACIDADES
            $table->enum('Pronostico', ['Favorable', 'Moderado', 'Grave', 'Reservado'])->nullable();
            $table->boolean('Incapacidad')->nullable();

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
        Schema::dropIfExists('Consultas');
    }
}
