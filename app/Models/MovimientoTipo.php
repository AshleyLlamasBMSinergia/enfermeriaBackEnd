<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoTipo extends Model
{
    use HasFactory;

    protected $table = 'MovimientoTipos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'clave',
        'tipoDeMovimiento',
        'afecta',
    ];

    //Uno a Muchos
    public function movimientos(){
        return $this->hasMany('App\Models\Movimientos');
    }
}
