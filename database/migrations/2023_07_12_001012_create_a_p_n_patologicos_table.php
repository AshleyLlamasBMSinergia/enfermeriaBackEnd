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

            $table->enum('obstetrico', ['No', 'Si'])->nullable();
            $table->enum('menarca', ['No', 'Si'])->nullable();
            $table->enum('alcoholismo', ['No', 'Si'])->nullable();
            $table->enum('tabaquismo', ['No', 'Si'])->nullable();
            $table->enum('toxicomanias', ['No', 'Si'])->nullable();
            $table->enum('religion', ['No', 'Si'])->nullable();
            $table->string('pasatiempos')->nullable();
            $table->string('tipoYRH')->nullable(); //Tipo y RH

            $table->enum('inmunizaciones', ['No', 'Si'])->nullable();
            $table->string('espInmunizaciones')->nullable();

            $table->enum('alimentacion', ['No', 'Si'])->nullable();
            $table->string('espAlimentacion')->nullable();

            $table->enum('aseoPersonal', ['Buena', 'Regular', 'Mala'])->nullable();

            $table->enum('deportes', ['No', 'Si'])->nullable();
            $table->string('espDeportes')->nullable();

            $table->enum('bajo', ['No', 'Si'])->nullable();
            $table->enum('sobrePeso', ['No', 'Si'])->nullable();
            $table->enum('hacinamiento', ['No', 'Si'])->nullable();
            $table->enum('promiscuidad', ['No', 'Si'])->nullable();
            
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
