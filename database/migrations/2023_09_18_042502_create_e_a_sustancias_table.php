<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEASustanciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EASustancias', function (Blueprint $table) {
            $table->id();

            $table->string('sustancia')->nullable();
            $table->string('resultado')->nullable();

            $table->unsignedBigInteger('EAntidoping_id')->nullable();
            $table->foreign('EAntidoping_id')->references('id')->on('EAntidopings')->onDelete('set null')->onUpdate('cascade');

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
        Schema::dropIfExists('EASustancias');
    }
}
