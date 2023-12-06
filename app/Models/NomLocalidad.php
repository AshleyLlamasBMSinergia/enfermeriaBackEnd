<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomLocalidad extends Model
{
    use HasFactory;

    protected $table = 'NomLocalidades';

    protected $guarded = ['id'];

    public $timestamps = false;


    protected $fillable = [
        'localidad',
        'nombre',
        'clave',
        'municipio',
        'estado_id',
    ];

    //Uno a Muchos Inversa
    public function estado(){
        return $this->belongsTo('App\Models\NomEstado');
    }

    //Uno a Muchos
    public function direcciones(){
        return $this->hasMany('App\Models\Direccion');
    }
}
