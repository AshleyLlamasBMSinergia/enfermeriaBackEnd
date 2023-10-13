<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empresas', function (Blueprint $table) {
            $table->id();

            $table->string('grupo')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Empresas');
    }
}
