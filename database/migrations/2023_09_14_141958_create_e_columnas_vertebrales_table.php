<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEColumnasVertebralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EColumnasVertebrales', function (Blueprint $table) {
            $table->id();

            $table->string('lordosis')->nullable();
            $table->string('flexion')->nullable();
            $table->string('lateralizacion')->nullable();
            $table->string('puntosDolor')->nullable();
            $table->string('xifosis')->nullable();
            $table->string('extension')->nullable();
            $table->string('rotacion')->nullable();
            $table->longText('otros')->nullable();

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
        Schema::dropIfExists('EColumnasVertebrales');
    }
}
