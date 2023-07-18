<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomEmpleado extends Model
{
    use HasFactory;

    protected $table = 'NomEmpleados';

    protected $primaryKey = 'Empleado';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Paterno',
        'Materno',
        'Nombres',
        'Nombre',
        'RFC',
        'Curp',
        'Imss',
        'Sexo',
        'FechaNacimiento',
        'EstadoCivil',
        'Telefono',
        'Calle',
        'Exterior',
        'Interior',
        'Colonia',
        'CP',
        'Localidad',
        'Correo',
        'Puesto',
        'Departamento',
        'Leyenda',
        'Plaza',
        'Categoria',
        'Jefe',
        'Contrato',
        'DiasContrato',
        'DiasSemana',
        'Horario',
        'Sueldo',
        'SDI',
        'Integrado',
        'FechaIngreso',
        'FechaBaja',
        'CausaBaja',
        'Sindicato',
        'ValeElectronico',
        'PagoElectronico',
        'Cuenta',
        'Sodexo',
        'Baja',
        'Observaciones',
        'Observaciones2',
        'Observaciones3',
        'Foto',
        'Neto',
        'Clinica',
        'Orden',
        'Usuario',
        'Fonacot',
        'Autorizacion',
        'CuentaHSBC',
        'Clabe',
        'Enviar',
        'CorreoEmpresa',
        'TelEmpresa',
        'DiaDescanso',
        'Escolaridad',
        'Profesion',
        'ClaveEscolaridad',
        'ClaveDocumento',
        'ClaveInstitucion',
        'CausaBajaReal',
        'Cc',
        'ClaveFactor',
        'EsNuevo',
        'FechaBajaR',
        'CpCfdi',
        'NombreCfdi',
        'EsCorporativo',
        'ReemplazaA',
    ];

    //Uno a uno polimorfico
    public function historialMedico(){
        return $this->morphOne('App\Models\HistorialMedico', 'pacientable');
    }
}
