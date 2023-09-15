<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEToraxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EToraxs', function (Blueprint $table) {
            $table->id();

            $table->string('camposPulmonares')->nullable();
            $table->string('ampAmplex')->nullable();
            $table->string('ruidoPulmonar')->nullable();
            $table->string('transVoz')->nullable();
            $table->string('areaPrecordial')->nullable();
            $table->string('FC')->nullable();
            $table->string('tono')->nullable();
            $table->string('ritmo')->nullable();
            
            $table->longText('observaciones')->nullable();

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
        Schema::dropIfExists('EToraxs');
    }
}
