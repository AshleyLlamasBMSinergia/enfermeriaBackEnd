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

            $table->id();

            // $table->unsignedBigInteger('Usuario')->nullable();
            // $table->foreign('Usuario')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

            $table->decimal('talla')->nullable();
            $table->decimal('peso')->nullable();

            $table->string('numeroEmergencia')->nullable();

            //PACIENTE: EMPLEADO - DEPENDIENTE
            $table->string('pacientable_id')->nullable(); // PACIENTE - ID TIPO
            $table->string('pacientable_type')->nullable(); // PACIENTE - TIPO

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            
            $table->unsignedBigInteger('APPatologicos_id')->nullable();
            $table->foreign('APPatologicos_id')->references('id')->on('APPatologicos');

            $table->unsignedBigInteger('APNPatologicos_id')->nullable();
            $table->foreign('APNPatologicos_id')->references('id')->on('APNPatologicos');

            $table->unsignedBigInteger('AHeredofamiliares_id')->nullable();
            $table->foreign('AHeredofamiliares_id')->references('id')->on('AHeredofamiliares');

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
