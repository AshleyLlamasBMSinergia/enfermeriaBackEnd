<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Requisiciones', function (Blueprint $table) {
            $table->id();

            $table->string('folio')->nullable();
            $table->date('fecha')->nullable();

            //Quien lo solicita?
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('NomEmpleados')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('autorizacion_id')->nullable();
            $table->foreign('autorizacion_id')->references('id')->on('Aprobaciones');

            $table->unsignedBigInteger('seguimiento_id')->nullable();
            $table->foreign('seguimiento_id')->references('id')->on('Aprobaciones');
            
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
        Schema::dropIfExists('Requisiciones');
    }
}
