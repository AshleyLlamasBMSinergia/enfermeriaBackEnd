<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidenteCostEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AccidenteCostEstudios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->float('monto');

            $table->unsignedBigInteger('accidente_id')->nullable();
            $table->foreign('accidente_id')->references('id')->on('Accidentes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AccidenteCostEstudios');
    }
}
