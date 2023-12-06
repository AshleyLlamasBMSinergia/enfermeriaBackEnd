<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomSecuela extends Model
{
    use HasFactory;

    protected $table = 'NomSecuelas';

    protected $primaryKey  = 'Secuela';

    protected $keyType = 'string';

    protected $fillable = [
        'Secuela',
        'Nombre'
    ];
}
