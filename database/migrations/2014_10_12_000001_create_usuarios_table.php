<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuarios', function (Blueprint $table) {
            $table->string('Usuario')->primary();
            $table->string('Nombre')->nullable();
            $table->string('Password')->nullable();
            $table->string('Nivel')->nullable();
            $table->smallInteger('Plaza')->nullable();
            $table->boolean('Bloqueo')->nullable();
            $table->boolean('Admin')->nullable();
            $table->string('Gerente')->nullable();
            $table->string('Correo')->nullable();
            $table->string('CedulaProfesional')->nullable();
            $table->timestamps();
        });

        //DB::statement('ALTER TABLE Usuarios ADD PRIMARY KEY (Usuario)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Usuarios');
    }
}
