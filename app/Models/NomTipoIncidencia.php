<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomTipoIncidencia extends Model
{
    use HasFactory;

    protected $table = 'NomTipoIncidencias';

    protected $primaryKey  = 'TipoIncidencia';

    protected $keyType = 'string';

    protected $fillable = [
        'TipoIncidencia',
        'Nombre',
        'DamosVales',
        'Vacaciones',
        'Incapacidad',
        'Tipo',
        'PorCiento',
        'RamaSeguro',
        'Grupo',
        'Ptu'
    ];
}
