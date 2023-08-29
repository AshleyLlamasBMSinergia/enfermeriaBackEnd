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
        'Día',
        'Entrada',
        'InicioBreak',
        'FinBreak',
        'Salida',
        'Profesional'
    ];

    // Uno a muchos inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
