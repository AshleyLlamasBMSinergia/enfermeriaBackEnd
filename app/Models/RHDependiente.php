<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RHDependiente extends Model
{
    use HasFactory;

    protected $table = 'RHDependientes';

    protected $primaryKey = 'Dependiente';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Empleado',
        'Paterno',
        'Materno',
        'Nombres',
        'Nacimiento',
        'Sexo',
        'Parentesco',
        'Status',
        'Beneficiario',
    ];

    //Uno a uno polimorfico
    public function historialMedico(){
        return $this->morphOne('App\Models\HistorialMedico', 'pacientable');
    }
}