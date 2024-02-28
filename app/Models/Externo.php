<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Externo extends Model
{
    use HasFactory;

    protected $table = 'Externos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'nombre',
        'sexo',
        'fechaNacimiento',
        'telefono',
        'correo',
        'cedi_id'
    ];

    //Uno a uno polimorfico
    public function historialMedico(){
        return $this->morphOne('App\Models\HistorialMedico', 'pacientable');
    }

    //Uno a uno polimorfico 
    public function consulta(){
        return $this->morphOne('App\Models\Consulta', 'pacientable'); //TODO Revisar !!!
    }

    //Uno a Muchos
    public function consultas(){
        return $this->hasMany('App\Models\Consulta', 'id');
    }

    //Uno a uno polimorficab
    public function image(){
        return $this->morphOne('App\Models\Imagen', 'imageable');
    }

    // Uno a muchos inversa
    public function cedi()
    {
        return $this->belongsTo('App\Models\Cedi', 'cedi_id');
    }
}
