<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'Movimientos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'fecha',
        'profesional_id',
        'inventario_id',
        'movimientoTipo_id',
    ];

    // Uno a muchos inversa
    public function lote()
    {
        return $this->belongsTo(Lote::class, 'lote_id');
    }

    // Uno a muchos inversa
    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }

    // Uno a muchos inversa
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'profesional_id');
    }

     //Uno a Muchos Inversa
     public function tipoDeMovimiento(){
        return $this->belongsTo('App\Models\MovimientoTipo', 'movimientoTipo_id');
    }

    //Uno a Muchos
    public function movimientoMovs(){
        return $this->hasMany('App\Models\MovimientoMov');
    }

    public function archivos()
    {
       return $this->morphMany('App\Models\Archivo', 'archivable');
    }
}
