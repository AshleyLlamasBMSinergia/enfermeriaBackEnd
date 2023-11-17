<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncapacidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Incapacidades', function (Blueprint $table) {
            $table->id();

            $table->string('tipo');
            $table->string('consecuente')->nullable();

            $table->date('fechaInicial');
            $table->date('fechaTermino')->nullable();

            $table->integer('dias')->nullable();
            $table->date('fechaProxRevision')->nullable();

            $table->string('calificacionAccidente')->nullable();
            $table->string('causa')->nullable();
            $table->longText('diagnostico')->nullable();
            $table->longText('observaciones')->nullable();

            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('NomEmpleados')->onDelete('set null')->onUpdate('cascade');

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
        Schema::dropIfExists('Incapacidades');
    }
}
