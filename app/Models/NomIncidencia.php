<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomIncidencia extends Model
{
    use HasFactory;

    protected $table = 'NomIncidencias';

    public $timestamps = false;

    protected $fillable = [
        'Empleado',
        'FechaEfectiva',
        'Sueldo',
        'Integrado',
        'TipoIncidencia',
        'Incapacidad',
        'Axo',
        'Fecha',
        'Dias',
        'Importado',
        'TipoRiesgo',
        'Secuela',
        'ControlIncapacidad',
        'Aplicada',
        'TipoPermiso',
        'incapacidad_id'
    ];

    //Uno a Muchos Inversa
    public function incapacidades(){
        return $this->belongsTo('App\Models\Incapacidades', 'incapacidad_id');
    }
}
