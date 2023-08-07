<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialesMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HistorialesMedicos', function (Blueprint $table) {

            $table->id('HistorialMedico');

            // $table->unsignedBigInteger('Usuario')->nullable();
            // $table->foreign('Usuario')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

            //PACIENTE: EMPLEADO - DEPENDIENTE
            $table->string('pacientable_id')->nullable(); // PACIENTE - ID TIPO
            $table->string('pacientable_type')->nullable(); // PACIENTE - TIPO

            $table->string('Usuario')->nullable();
            $table->foreign('Usuario')->references('Usuario')->on('Usuarios')->onDelete('set null')->onUpdate('cascade');
            
            $table->unsignedBigInteger('APPatologicos')->nullable();
            $table->foreign('APPatologicos')->references('id')->on('APPatologicos');

            $table->unsignedBigInteger('APNPpatologicos')->nullable();
            $table->foreign('APNPpatologicos')->references('id')->on('APNPpatologicos');

            $table->unsignedBigInteger('AHeredofamiliares')->nullable();
            $table->foreign('AHeredofamiliares')->references('id')->on('AHeredofamiliares');

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
        Schema::dropIfExists('HistorialesMedicos');
    }
}
