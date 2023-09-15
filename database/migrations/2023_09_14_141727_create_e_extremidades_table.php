<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEExtremidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EExtremidades', function (Blueprint $table) {
            $table->id();

            $table->string('toraxicas')->nullable();
            $table->string('hombro')->nullable();
            $table->string('codo')->nullable();
            $table->string('muñeca')->nullable();
            $table->string('pie')->nullable();
            $table->string('movilidad')->nullable();
            $table->string('pelvicas')->nullable();
            $table->string('cadera')->nullable();
            $table->string('rodilla')->nullable();
            $table->string('tobillo')->nullable();
            $table->string('mano')->nullable();
            $table->string('fuerza')->nullable();
            
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
        Schema::dropIfExists('EExtremidades');
    }
}
