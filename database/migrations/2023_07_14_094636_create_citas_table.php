<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Citas', function (Blueprint $table) {
            $table->id();

            $table->dateTime('fecha')->nullable();
            $table->string('tipo');
            // $table->enum('Tipo', ['Consulta', ' Psicólogo', 'Nutriólogo']);
            $table->string('color')->nullable();
            $table->string('motivo')->nullable();

            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->foreign('paciente_id')->references('id')->on('HistorialesMedicos');
            
            $table->unsignedBigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('Profesionales');
            
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
        Schema::dropIfExists('Citas');
    }
}
