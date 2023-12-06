<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Direcciones', function (Blueprint $table) {
            $table->id();

            $table->string('calle')->nullable();
            $table->string('exterior')->nullable();
            $table->string('interior')->nullable();
            $table->string('colonia')->nullable();
            $table->string('CP')->nullable();
            
            
            $table->unsignedBigInteger('localidad_id')->nullable();
            $table->foreign('localidad_id')->references('id')->on('NomLocalidades')->onDelete('set null')->onUpdate('cascade');


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
        Schema::dropIfExists('direccions');
    }
}
