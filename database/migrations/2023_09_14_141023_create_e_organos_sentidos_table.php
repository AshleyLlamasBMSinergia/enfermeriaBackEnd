<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEOrganosSentidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EOrganosSentidos', function (Blueprint $table) {
            $table->id();

            $table->string('vista')->nullable();
            $table->string('oido')->nullable();
            $table->string('olfato')->nullable();
            $table->string('tacto')->nullable();
            
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
        Schema::dropIfExists('EOrganosSentidos');
    }
}
