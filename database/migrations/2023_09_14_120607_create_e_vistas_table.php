<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEVistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evistas', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');

            $table->string('tipo')->nullable();
            $table->string('necesitaLentes')->nullable();
            $table->string('usaLentes')->nullable();

            $table->longText('comentarios')->nullable();

            $table->unsignedBigInteger('historialMedico_id')->nullable();
            $table->foreign('historialMedico_id')->references('id')->on('HistorialesMedicos')->onDelete('set null')->onUpdate('cascade');


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
        Schema::dropIfExists('Evistas');
    }
}
