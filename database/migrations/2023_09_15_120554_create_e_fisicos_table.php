<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEFisicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EFisicos', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->string('TA')->nullable();
            $table->string('FR')->nullable();
            $table->decimal('peso')->nullable();
            $table->string('TC')->nullable();
            $table->decimal('temperatura')->nullable();
            $table->string('talla')->nullable();
            $table->string('estadoConciencia')->nullable();
            $table->string('coordinacion')->nullable();
            $table->string('equilibrio')->nullable();
            $table->string('marcha')->nullable();
            $table->string('orientacion')->nullable();
            $table->string('orientacionTiempo')->nullable();
            $table->string('orientacionPersona')->nullable();
            $table->string('orientacionEspacio')->nullable();

            $table->unsignedBigInteger('historialMedico_id')->nullable();
            $table->foreign('historialMedico_id')->references('id')->on('HistorialesMedicos')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('EOrganoSentido_id')->nullable();
            $table->foreign('EOrganoSentido_id')->references('id')->on('EOrganosSentidos')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('ECabeza_id')->nullable();
            $table->foreign('ECabeza_id')->references('id')->on('ECabezas')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('ETorax_id')->nullable();
            $table->foreign('ETorax_id')->references('id')->on('EToraxs')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('EAbdomen_id')->nullable();
            $table->foreign('EAbdomen_id')->references('id')->on('EAbdomenes')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('EExtremidad_id')->nullable();
            $table->foreign('EExtremidad_id')->references('id')->on('EExtremidades')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('EColumnaVertebral_id')->nullable();
            $table->foreign('EColumnaVertebral_id')->references('id')->on('EColumnasVertebrales')->onDelete('set null')->onUpdate('cascade');

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
        Schema::dropIfExists('e_fisicos');
    }
}
