<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Externo extends Model
{
    use HasFactory;

    protected $table = 'Externos';

    protected $primaryKey = 'Externo';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Paterno',
        'Materno',
        'Nombres',
        'Sexo',
        'FechaNacimiento',
        'Telefono',
        'Calle',
        'Exterior',
        'Interior',
        'Colonia',
        'CP',
        'Localidad',
        'Correo'
    ];

    //Uno a uno polimorfico
    public function historialMedico(){
        return $this->morphOne('App\Models\HistorialMedico', 'pacientable');
    }
}
