<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NomIncidencias', function (Blueprint $table) {
            $table->integer('Empleado');
            $table->dateTime('FechaEfectiva');
            $table->decimal('Sueldo');
            $table->decimal('Integrado');

            $table->string('TipoIncidencia');
            $table->foreign('TipoIncidencia')->references('TipoIncidencia')->on('NomTipoIncidencias');

            $table->string('Incapacidad');
            $table->smallInteger('Axo');
            $table->date('Fecha');
            $table->integer('Dias');
            $table->string('Importado');
            
            $table->string('TipoRiesgo')->nullable()->default('0');
            $table->foreign('TipoRiesgo')->references('TipoRiesgo')->on('NomTipoRiesgos');

            $table->string('Secuela')->nullable()->default('0');
            $table->foreign('Secuela')->references('Secuela')->on('NomSecuelas');

            $table->string('ControlIncapacidad')->nullable()->default('0');
            $table->foreign('ControlIncapacidad')->references('ControlIncapacidad')->on('NomControlIncapacidades');

            $table->boolean('Aplicada');

            $table->string('TipoPermiso')->nullable()->default('0');
            $table->foreign('TipoPermiso')->references('TipoPermiso')->on('NomTipoPermisos');

            $table->unsignedBigInteger('incapacidad_id')->nullable();
            $table->foreign('incapacidad_id')->references('id')->on('Incapacidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nom_incidencias');
    }
}
