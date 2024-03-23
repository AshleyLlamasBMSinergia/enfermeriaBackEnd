<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id')->references('id')->on('Departamentos')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('NomEmpleados')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('accidente_id')->nullable();
            $table->foreign('accidente_id')->references('id')->on('Accidentes')->onDelete('set null')->onUpdate('cascade');

            $table->string('doctos')->nullable();
            $table->string('estatus')->nullable();

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
        Schema::dropIfExists('casos');
    }
}
