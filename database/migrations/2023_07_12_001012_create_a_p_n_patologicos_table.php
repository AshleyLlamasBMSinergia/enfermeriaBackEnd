<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAPNPatologicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('APNPpatologicos', function (Blueprint $table) {
            $table->id();

            $table->enum('Anticonceptivos', ['No', 'Si'])->nullable();
            //Esp de especificar
            $table->string('EspAnticonceptivos')->nullable();

            $table->enum('Obstetrico', ['No', 'Si'])->nullable();
            $table->enum('Menarca', ['No', 'Si'])->nullable();
            $table->enum('Alcoholismo', ['No', 'Si'])->nullable();
            $table->enum('Tabaquismo', ['No', 'Si'])->nullable();
            $table->enum('Toxicomanias', ['No', 'Si'])->nullable();
            $table->enum('Religion', ['No', 'Si'])->nullable();
            $table->string('Pasatiempos')->nullable();
            $table->string('TipoYRH')->nullable(); //Tipo y RH

            $table->enum('Inmunizaciones', ['No', 'Si'])->nullable();
            $table->string('EspInmunizaciones')->nullable();

            $table->enum('Alimentacion', ['No', 'Si'])->nullable();
            $table->string('EspAlimentacion')->nullable();

            $table->enum('AseoPersonal', ['Buena', 'Regular', 'Mala'])->nullable();

            $table->enum('Deportes', ['No', 'Si'])->nullable();
            $table->string('EspDeportes')->nullable();

            $table->enum('Bajo', ['No', 'Si'])->nullable();
            $table->enum('SobrePeso', ['No', 'Si'])->nullable();
            $table->enum('Hacinamiento', ['No', 'Si'])->nullable();
            $table->enum('Promiscuidad', ['No', 'Si'])->nullable();
            
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
        Schema::dropIfExists('APNPpatologicos');
    }
}
