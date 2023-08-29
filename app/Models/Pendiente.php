<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendiente extends Model
{
    use HasFactory;

    protected $table = 'Pendientes';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'titulo',
        'estatus'
    ];
}
