<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'Inventarios';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'nombre',
        'direccion_id',
        'cedi_id'
    ];

    
    //Muchos a Muchos
    public function profesionales(){
        return $this->belongsToMany('App\Models\Profesional');
    }

    //Muchos a Muchos
    public function insumos(){
        return $this->belongsToMany('App\Models\Insumo');
    }

    //Uno a muchos
    public function entradas(){
        return $this->hasMany('App\Models\Entrada');
    }

    //Uno a muchos
    public function salidas(){
        return $this->hasMany('App\Models\Salida');
    }

    //Uno a muchos
    public function lotes(){
        return $this->hasMany('App\Models\Lote');
    }
}
