<?php

namespace App\Models\rh;

use App\Models\Direccion;
use Database\Seeders\NomEmpleadoSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NomEmpleado extends Model
{
    protected $table = 'NomEmpleados';
    protected $key = 'Empleado';

    protected $guarded = ['Empleado', 'created_at', 'updated'];

    protected $fillable = [
        'Nombre',
        'RFC',
        'Curp',
        'Sexo',
        'FechaNacimiento',
        'EstadoCivil',
        'Telefono',
        'Correo',
        'CorreoEmpresa',
        'Puesto',
    ];

    static function getEmpleado($id){
        // return NomEmpleado::on('RecursosHumanosCAN')->where('Empleado', $id)->first();
        return DB::connection('RecursosHumanosCAN')->table('NomEmpleados')->where('Empleado', $id)
            ->select(
                'Nombre',
                'RFC',
                'Curp',
                'Sexo',
                'FechaNacimiento',
                'EstadoCivil',
                'Telefono',
                'Correo',
                'CorreoEmpresa',
                'Puesto',
            )->first();
    }
}
