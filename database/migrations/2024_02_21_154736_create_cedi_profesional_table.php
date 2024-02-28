<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCediProfesionalTable extends Migration
{
    public function up()
    {
        Schema::create('cedi_profesional', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('cedi_id')->nullable();
            $table->foreign('cedi_id')->references('id')->on('Cedis')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('Profesionales')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cedi_profesional');
    }
}
