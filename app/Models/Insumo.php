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
        'requisicion_id'
    ];

    //Uno a Muchos
    public function lotes(){
        return $this->hasMany('App\Models\Lote');
    }
}
