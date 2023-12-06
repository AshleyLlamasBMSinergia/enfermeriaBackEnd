<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomTipoPermiso extends Model
{
    use HasFactory;

    protected $table = 'NomTipoPermisos';

    protected $primaryKey  = 'TipoPermiso';

    protected $fillable = [
        'TipoPermiso',
        'Nombre'
    ];
}
