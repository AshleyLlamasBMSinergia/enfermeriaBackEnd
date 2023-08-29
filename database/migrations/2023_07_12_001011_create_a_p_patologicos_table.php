<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAPPatologicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('APPatologicos', function (Blueprint $table) {
            $table->id();

            $table->enum('cirujias', ['No', 'Si'])->nullable();
            //Esp de especificar
            $table->string('espCirujias')->nullable();

            $table->enum('contusiones', ['No', 'Si'])->nullable();
            $table->string('espContusiones')->nullable();

            $table->enum('lumbalgias', ['No', 'Si'])->nullable();
            $table->string('espLumbalgias')->nullable();

            $table->enum('hernias', ['No', 'Si'])->nullable();
            $table->string('espHernias')->nullable();

            $table->enum('fracturas', ['No', 'Si'])->nullable();
            $table->string('espFracturas')->nullable();

            $table->enum('dorsalgias', ['No', 'Si'])->nullable();
            $table->string('espDorsalgias')->nullable();

            $table->enum('hospitalizaciones', ['No', 'Si'])->nullable();
            $table->string('espHospitalizaciones')->nullable();

            $table->enum('esguinces', ['No', 'Si'])->nullable();
            $table->string('espEsguinces')->nullable();

            $table->enum('lesionesArteriales', ['No', 'Si'])->nullable();
            $table->string('espLesionesArteriales')->nullable();

            $table->enum('transfusiones', ['No', 'Si'])->nullable();
            $table->string('espTransfusiones')->nullable();

            $table->enum('luxaciones', ['No', 'Si'])->nullable();
            $table->string('espLuxaciones')->nullable();

            $table->enum('tetanias', ['No', 'Si'])->nullable();
            $table->string('espTetanias')->nullable();

            $table->enum('alergias', ['No', 'Si'])->nullable();
            $table->string('espAlergias')->nullable();

            $table->enum('asma', ['No', 'Si'])->nullable();
            $table->enum('epilepsia', ['No', 'Si'])->nullable();

            //Enf de enfermedades
            $table->enum('enfDentales', ['No', 'Si'])->nullable();
            $table->string('espEnfDentales')->nullable();

            $table->enum('enfOpticas', ['No', 'Si'])->nullable();
            $table->string('espEnfOpticas')->nullable();

            //Alt de alteraciones
            $table->enum('altPsicologicas', ['No', 'Si'])->nullable();
            $table->string('espAltPsicologicas')->nullable();

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
        Schema::dropIfExists('APPatologicos');
    }
}
