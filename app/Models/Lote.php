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
        'inventario_id',
    ];

    //Uno a Muchos Inversa
    public function insumo()
    {
        return $this->belongsTo(Insumo::class, 'insumo_id');
    }

    //Uno a Muchos Inversa
    public function inventario()
    {
        return $this->belongsTo('App\Models\Inventario', 'inventario_id');
    }

    //Muchos a Muchos
    public function inventarios(){
        return $this->belongsToMany('App\Models\Lote');
    }

    //Uno a Muchos
    public function movimientoMovs(){
        return $this->hasMany('App\Models\MovimientoMov');
    }
}
