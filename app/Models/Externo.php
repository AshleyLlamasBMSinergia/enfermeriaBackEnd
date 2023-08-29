<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Externo extends Model
{
    use HasFactory;

    protected $table = 'Externos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'paterno',
        'materno',
        'nombre',
        'sexo',
        'fechaNacimiento',
        'telefono',
        'calle',
        'exterior',
        'interior',
        'colonia',
        'CP',
        'localidad',
        'correo',
        'empleado'
    ];

    //Uno a uno polimorfico
    public function historialMedico(){
        return $this->morphOne('App\Models\HistorialMedico', 'pacientable');
    }

    //Uno a uno polimorfico
    public function consulta(){
        return $this->morphOne('App\Models\Consulta', 'pacientable');
    }
}
