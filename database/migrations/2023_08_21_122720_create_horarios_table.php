<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Horarios', function (Blueprint $table) {
            $table->id();

            $table->enum('dia', [0, 1, 2, 3, 4, 5, 6]);
            $table->time('entrada');
            $table->time('inicioBreak')->nullable();
            $table->time('finBreak')->nullable();
            $table->time('salida');
            
            //ENFERMERO - DOCTOR
            $table->unsignedBigInteger('profesional_id')->nullable();
            $table->foreign('profesional_id')->references('id')->on('Profesionales');

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
        Schema::dropIfExists('horarios');
    }
}
