<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRHDependientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RHDependientes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('NomEmpleados');

            $table->string('nombre')->nullable();
            $table->dateTime('fechaNacimiento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('parentesco')->nullable();
 
            $table->unsignedBigInteger('cedi_id')->nullable();
            $table->foreign('cedi_id')->references('id')->on('Cedis');

            $table->string('estatus')->nullable()->default(true);
            
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
        Schema::dropIfExists('RHDependientes');
    }
}
