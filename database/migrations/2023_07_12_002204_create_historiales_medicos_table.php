<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialesMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HistorialesMedicos', function (Blueprint $table) {

            $table->string('HistorialMedico')->primary();

            // $table->unsignedBigInteger('Usuario')->nullable()->nullable();
            // $table->foreign('Usuario')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

            $table->string('Usuario')->nullable();
            $table->foreign('Usuario')->references('Usuario')->on('Usuarios')->onDelete('set null')->onUpdate('cascade');
            
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
        Schema::dropIfExists('HistorialesMedicos');
    }
}
