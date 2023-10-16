<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarioProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_profesional', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('profesionales_id')->nullable();
            $table->foreign('profesionales_id')->references('id')->on('Profesionales')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('inventario_id')->nullable();
            $table->foreign('inventario_id')->references('id')->on('Inventarios')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('inventario_profesional');
    }
}
