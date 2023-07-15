<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNomEmpledosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NomEmpledos', function (Blueprint $table) {
            $table->string('Empleado')->primary();

            $table->string('Paterno')->nullable();
            $table->string('Materno')->nullable();
            $table->string('Nombres')->nullable();
            $table->string('Nombre')->nullable();
            $table->string('RFC')->nullable();
            $table->string('Curp')->nullable();
            $table->string('Imss')->nullable();
            $table->string('Sexo')->nullable();
            $table->date('FechaNacimiento')->nullable();
            $table->string('EstadoCivil')->nullable();
            $table->string('Telefono')->nullable();
            $table->string('Calle')->nullable();
            $table->string('Exterior')->nullable();
            $table->string('Interior')->nullable();
            $table->string('Colonia')->nullable();
            $table->string('CP')->nullable();
            $table->string('Localidad')->nullable();
            $table->string('Correo')->nullable();
            $table->smallInteger('Puesto')->nullable();
            $table->smallInteger('Departamento')->nullable();
            $table->string('Leyenda')->nullable();
            $table->smallInteger('Plaza')->nullable();
            $table->smallInteger('Categoria')->nullable();
            $table->smallInteger('Jefe')->nullable();
            $table->smallInteger('Contrato')->nullable();
            $table->smallInteger('DiasContrato')->nullable();
            $table->smallInteger('DiasSemana')->nullable();
            $table->smallInteger('Horario')->nullable();
            $table->smallInteger('Sueldo')->nullable();
            $table->smallInteger('SDI')->nullable();
            $table->smallInteger('Integrado')->nullable();
            $table->dateTime('FechaIngreso')->nullable();
            $table->dateTime('FechaBaja')->nullable();
            $table->string('CausaBaja')->nullable();
            $table->boolean('Sindicato')->nullable();
            $table->boolean('ValeElectronico')->nullable();
            $table->boolean('PagoElectronico')->nullable();
            $table->string('Cuenta')->nullable();
            $table->string('Sodexo')->nullable();
            $table->string('Baja')->nullable();
            $table->string('Observaciones')->nullable();
            $table->string('Observaciones2')->nullable();
            $table->string('Observaciones3')->nullable();
            $table->binary('Foto')->nullable();
            $table->boolean('Neto')->nullable();
            $table->smallInteger('Clinica')->nullable();
            $table->smallInteger('Orden')->nullable();
            
            $table->string('Usuario')->nullable();
            $table->foreign('Usuario')->references('Usuario')->on('Usuarios')->onDelete('set null')->onUpdate('cascade');
            
            $table->string('Fonacot')->nullable();
            $table->boolean('Autorizacion')->nullable();
            $table->string('CuentaHSBC')->nullable();
            $table->string('Clabe')->nullable();
            $table->boolean('Enviar')->nullable();
            $table->string('CorreoEmpresa')->nullable();
            $table->string('TelEmpresa')->nullable();
            $table->string('DiaDescanso')->nullable();
            $table->string('Escolaridad')->nullable();
            $table->string('Profesion')->nullable();
            $table->smallInteger('ClaveEscolaridad')->nullable();
            $table->smallInteger('ClaveDocumento')->nullable();
            $table->smallInteger('ClaveInstitucion')->nullable();
            $table->smallInteger('CausaBajaReal')->nullable();
            $table->smallInteger('Cc')->nullable();
            $table->smallInteger('ClaveFactor')->nullable();
            $table->boolean('EsNuevo')->nullable();
            $table->dateTime('FechaBajaR')->nullable();
            $table->string('CpCfdi')->nullable();
            $table->string('NombreCfdi')->nullable();
            $table->tinyInteger('Temporal')->nullable();
            $table->boolean('EsCorporativo')->nullable();
            $table->smallInteger('ReemplazaA')->nullable();
            
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
        Schema::dropIfExists('NomEmpledos');
    }
}
