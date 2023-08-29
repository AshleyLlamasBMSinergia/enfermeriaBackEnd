<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'Direcciones';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'calle',
        'exterior',
        'interior',
        'colonia',
        'CP',
        'localidad',
    ];
}
