<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table = 'Insumos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'nombre',
        'piezasPorLote',
        'descripcion',
        'precio',
        'requisicion_id',
        'inventario_id'
    ];

    //Uno a Muchos
    public function lotes(){
        return $this->hasMany('App\Models\Lote');
    }

    // Uno a muchos inversa
    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }
    

    public function image(){
        return $this->morphOne('App\Models\Imagen', 'imageable');
    }
}
