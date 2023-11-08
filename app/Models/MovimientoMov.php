<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoMov extends Model
{
    use HasFactory;

    protected $table = 'MovimientoMovs';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'lote_id',
        'unidades',
        'movimiento_id',
        'precio'
    ];

    //Uno a Muchos Inversa
     public function movimientos(){
        return $this->belongsTo('App\Models\Movimiento');
    }

    //Uno a Muchos Inversa
    public function lote(){
        return $this->belongsTo('App\Models\Lote');
    }
}
