<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;
    protected $table = 'Insumos';

    protected $primaryKey  = 'id';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'nombre',
        'piezasPorLote',
        'descripcion',
        'precio',
    ];

    //Uno a Muchos
    public function lotes(){
        return $this->hasMany('App\Models\Lote');
    }

    //Muchos a Muchos
    public function reactivos(){
        return $this->belongsToMany('App\Models\Reactivo');
    }

    //Muchos a Muchos
    public function inventarios(){
        return $this->belongsToMany('App\Models\Inventario');
    }

    public function image(){
        return $this->morphOne('App\Models\Imagen', 'imageable');
    }
}
