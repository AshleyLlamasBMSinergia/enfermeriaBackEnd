<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomTipoRiesgo extends Model
{
    use HasFactory;

    protected $table = 'NomTipoRiesgos';

    protected $primaryKey  = 'TipoRiesgo';

    protected $keyType = 'string';

    protected $fillable = [
        'TipoRiesgo',
        'Nombre'
    ];
}
