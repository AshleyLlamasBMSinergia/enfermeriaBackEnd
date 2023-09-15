<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table = 'Horarios';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'dia',
        'entrada',
        'inicioBreak',
        'finBreak',
        'salida',
        'profesional_id'
    ];

    // Uno a muchos inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
