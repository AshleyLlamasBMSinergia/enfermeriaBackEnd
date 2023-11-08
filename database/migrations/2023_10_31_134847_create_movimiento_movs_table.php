<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoMovsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MovimientoMovs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lote_id')->nullable();
            $table->foreign('lote_id')->references('id')->on('Lotes')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('movimiento_id')->nullable();
            $table->foreign('movimiento_id')->references('id')->on('Movimientos')->onDelete('set null')->onUpdate('cascade');

            $table->integer('unidades')->nullable();

            $table->decimal('precio')->nullable();

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
        Schema::dropIfExists('MovimientoMovs');
    }
}
