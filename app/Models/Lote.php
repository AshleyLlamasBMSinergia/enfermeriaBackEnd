<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $table = 'Lotes';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'lote',
        'fechaCaducidad',
        'fechaIngreso',
        'piezasDisponibles',
        'insumo_id',
    ];

    //Uno a Muchos Inversa
    public function insumo()
    {
        return $this->belongsTo(Insumo::class, 'insumo_id');
    }

    //Uno a Muchos
    public function movimientos(){
        return $this->hasMany('App\Models\Movimiento');
    }
}
