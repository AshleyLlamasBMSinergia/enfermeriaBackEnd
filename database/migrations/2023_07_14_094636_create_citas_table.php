<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Citas', function (Blueprint $table) {
            $table->id('Cita');

            $table->dateTime('Fecha')->nullable();
            $table->string('Tipo');
            // $table->enum('Tipo', ['Consulta', ' Psicólogo', 'Nutriólogo']);
            $table->string('Color')->nullable();
            $table->string('Motivo')->nullable();

            $table->unsignedBigInteger('Paciente')->nullable();
            $table->foreign('Paciente')->references('HistorialMedico')->on('HistorialesMedicos');
            
            $table->unsignedBigInteger('Profesional')->nullable();
            $table->foreign('Profesional')->references('Empleado')->on('NomEmpleados');
            
            // $table->string('Paciente')->nullable();
            // $table->foreign('Paciente')->references('HistorialMedico')->on('HistorialesMedicos')->onDelete('cascade')->onUpdate('cascade');
            
            // $table->string('Profesional')->nullable();
            // $table->foreign('Profesional')->references('Empleado')->on('NomEmpledos')->onDelete('set null')->onUpdate('cascade');

            //SE COMENTO POR ERROR: 
            //SQLSTATE[42000]: [Microsoft][ODBC Driver 17 for SQL Server][SQL Server]Introducing FOREIGN KEY constraint 'citas_profesional_foreign' on table 'citas' may cause cycles or multiple cascade paths. Specify ON DELETE NO ACTION or ON UPDATE NO ACTION, or modify other FOREIGN KEY constraints. (SQL: alter table "citas" add constraint "citas_profesional_foreign" foreign key ("Profesional") references "NomEmpledos" ("Empleado") on delete set null on update cascade)
            //Las eliminaciones y actualizaciones e tendran que hacer directamente desde el CRUD
            
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
        Schema::dropIfExists('Citas');
    }
}
