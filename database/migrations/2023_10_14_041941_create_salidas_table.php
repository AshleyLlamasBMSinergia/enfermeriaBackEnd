<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Salidas', function (Blueprint $table) {
            $table->id();

            $table->string('motivo');
            $table->longText('detalles')->nullable();

            $table->unsignedBigInteger('inventario_id')->nullable();
            $table->foreign('inventario_id')->references('id')->on('Inventarios')->onDelete('set null')->onUpdate('cascade');
            
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
        Schema::dropIfExists('Salidas');
    }
}
