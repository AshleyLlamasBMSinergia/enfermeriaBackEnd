<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Externos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre')->nullable();

            $table->string('sexo')->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();

            $table->unsignedBigInteger('direccion_id')->nullable();
            $table->foreign('direccion_id')->references('id')->on('Direcciones')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('cedi_id')->nullable();
            $table->foreign('cedi_id')->references('id')->on('Cedis');

            $table->boolean('estatus')->nullable()->default(true);

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
        Schema::dropIfExists('Externos');
    }
}
