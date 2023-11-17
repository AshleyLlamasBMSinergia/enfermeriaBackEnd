<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAltasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Altas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('revision_id')->nullable();
            $table->foreign('revision_id')->references('id')->on('Revisiones')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('Profesionales');

            $table->date('fechaFinal');
            $table->integer('diasTotal');

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
        Schema::dropIfExists('Altas');
    }
}
