<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomControlIncapacidad extends Model
{
    protected $table = 'NomControlIncapacidades';

    protected $primaryKey  = 'ControlIncapacidad';
    
    protected $keyType = 'string';

    protected $fillable = [
        'ControlIncapacidad',
        'Nombre'
    ];
}
