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
            $table->string('Consulta')->primary();

            //DATOS DE LA CITA
            $table->string('Cita')->nullable(); 
            $table->foreign('Cita')->references('Cita')->on('Citas')->onDelete('set null')->onUpdate('cascade');

            $table->dateTime('Fecha');
            
            //ENFERMERO - DOCTOR
            $table->string('Profesional')->nullable();
            $table->foreign('Profesional')->references('Empleado')->on('NomEmpledos');

            //PACIENTE
            $table->string('Pacientable')->nullable();// PACIENTE - ID TIPO
            $table->string('PacientableType')->nullable();// PACIENTE - TIPO

            //SIGNOS VITALES E INFORMACION DEL PACIENTE
            $table->time('TriajeClasificacion');
            $table->smallInteger('PrecionDiastolica');
            $table->smallInteger('FrecuenciaRespiratoria');
            $table->smallInteger('FrecuenciaCardiaca');
            $table->smallInteger('Temperatura');
            $table->smallInteger('Peso');
            $table->smallInteger('Edad');
            $table->decimal('Talla');
            $table->decimal('GrucemiaCapilar');

            //SOAP
            $table->longText('Subjetivo');
            $table->longText('Objetivo');
            $table->longText('Analisis');
            $table->longText('Plan');

            //RECETA
            $table->longText('Diagnostico');
            $table->longText('Receta');

            //INCAPACIDADES
            $table->enum('Pronostico', ['Favorable', 'Moderado', 'Grave', 'Reservado']);
            $table->boolean('Incapacidad');

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
