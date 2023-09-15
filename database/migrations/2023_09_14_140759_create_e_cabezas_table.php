<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateECabezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ECabezas', function (Blueprint $table) {
            $table->id();

            $table->string('craneo')->nullable();
            $table->string('ojos')->nullable();
            $table->string('nariz')->nullable();
            $table->string('boca')->nullable();
            $table->string('cuello')->nullable();

            $table->longText('observaciones')->nullable();

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
        Schema::dropIfExists('ECabezas');
    }
}
