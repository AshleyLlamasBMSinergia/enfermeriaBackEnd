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
            $table->id();

            //DATOS DE LA CITA
            $table->unsignedBigInteger('cita_id')->nullable(); 
            $table->foreign('cita_id')->references('id')->on('Citas')->onDelete('set null')->onUpdate('cascade');

            $table->dateTime('fecha');
            
            //ENFERMERO - DOCTOR
            $table->unsignedBigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('Profesionales');

            //PACIENTE
            $table->unsignedBigInteger('pacientable_id')->nullable();// PACIENTE - ID TIPO
            $table->string('pacientable_type')->nullable();// PACIENTE - TIPO

            //SIGNOS VITALES E INFORMACION DEL PACIENTE
            $table->smallInteger('triajeClasificacion')->nullable();
            $table->decimal('presionDiastolica')->nullable();
            $table->decimal('presionSistolica')->nullable();
            $table->decimal('frecuenciaRespiratoria')->nullable();
            $table->decimal('frecuenciaCardiaca')->nullable();
            $table->decimal('temperatura')->nullable();
            $table->integer('edad')->nullable();
            $table->decimal('peso')->nullable();
            $table->decimal('talla')->nullable();
            $table->decimal('mg')->nullable();
            $table->decimal('dl')->nullable();

            //SOAP
            $table->longText('subjetivo')->nullable();
            $table->longText('objetivo')->nullable();
            $table->longText('analisis')->nullable();
            $table->longText('plan')->nullable();

            //RECETA
            $table->longText('complemento')->nullable();
            $table->longText('receta')->nullable();

            $table->unsignedBigInteger('diagnostico_id')->nullable(); 
            $table->foreign('diagnostico_id')->references('id')->on('Diagnosticos')->onDelete('set null')->onUpdate('cascade');

            //INCAPACIDADES
            $table->enum('pronostico', ['Favorable', 'Moderado', 'Grave', 'Reservado'])->nullable();
            $table->boolean('incapacidad')->nullable();

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
