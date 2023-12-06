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

            $table->string('folio')->nullable();

            $table->date('fechaEfectiva');

            // $table->date('expedido')->nullable();
            $table->integer('dias')->nullable();

            $table->longText('diagnostico')->nullable();

            
            $table->string('TipoIncidencia');
            $table->foreign('TipoIncidencia')->references('TipoIncidencia')->on('NomTipoIncidencias');
            
            $table->string('TipoRiesgo')->nullable()->default('0');
            $table->foreign('TipoRiesgo')->references('TipoRiesgo')->on('NomTipoRiesgos');

            $table->string('Secuela')->nullable()->default('0');
            $table->foreign('Secuela')->references('Secuela')->on('NomSecuelas');

            $table->string('ControlIncapacidad')->nullable()->default('0');
            $table->foreign('ControlIncapacidad')->references('ControlIncapacidad')->on('NomControlIncapacidades');

            $table->string('TipoPermiso')->nullable()->default('0');
            $table->foreign('TipoPermiso')->references('TipoPermiso')->on('NomTipoPermisos');
            
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
