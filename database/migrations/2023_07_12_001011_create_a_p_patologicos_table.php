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

            $table->enum('Cirujias', ['No', 'Si'])->nullable();
            //Esp de especificar
            $table->string('EspCirujias')->nullable();

            $table->enum('Contusiones', ['No', 'Si'])->nullable();
            $table->string('EspContusiones')->nullable();

            $table->enum('Lumbalgias', ['No', 'Si'])->nullable();
            $table->string('EspLumbalgias')->nullable();

            $table->enum('Hernias', ['No', 'Si'])->nullable();
            $table->string('EspHernias')->nullable();

            $table->enum('Fracturas', ['No', 'Si'])->nullable();
            $table->string('EspFracturas')->nullable();

            $table->enum('Dorsalgias', ['No', 'Si'])->nullable();
            $table->string('EspDorsalgias')->nullable();

            $table->enum('Hospitalizaciones', ['No', 'Si'])->nullable();
            $table->string('EspHospitalizaciones')->nullable();

            $table->enum('Esguinces', ['No', 'Si'])->nullable();
            $table->string('EspEsguinces')->nullable();

            $table->enum('LesionesArteriales', ['No', 'Si'])->nullable();
            $table->string('EspLesionesArteriales')->nullable();

            $table->enum('Transfusiones', ['No', 'Si'])->nullable();
            $table->string('EspTransfusiones')->nullable();

            $table->enum('Luxaciones', ['No', 'Si'])->nullable();
            $table->string('EspLuxaciones')->nullable();

            $table->enum('Tetanias', ['No', 'Si'])->nullable();
            $table->string('EspTetanias')->nullable();

            $table->enum('Alergias', ['No', 'Si'])->nullable();
            $table->string('EspAlergias')->nullable();

            $table->enum('Asma', ['No', 'Si'])->nullable();
            $table->enum('Epilepsia', ['No', 'Si'])->nullable();

            //Enf de enfermedades
            $table->enum('EnfDentales', ['No', 'Si'])->nullable();
            $table->string('EspEnfDentales')->nullable();

            $table->enum('EnfOpticas', ['No', 'Si'])->nullable();
            $table->string('EspEnfOpticas')->nullable();

            //Alt de alteraciones
            $table->enum('AltPsicologicas', ['No', 'Si'])->nullable();
            $table->string('EspAltPsicologicas')->nullable();

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
