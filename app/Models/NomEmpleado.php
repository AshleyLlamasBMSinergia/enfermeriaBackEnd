<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomEmpleado extends Model
{
    use HasFactory;

    protected $table = 'NomEmpleados';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'paterno',
        'materno',
        'nombre',
        'RFC',
        'CURP',
        'IMSS',
        'sexo',
        'fechaNacimiento',
        'estadoCivil',
        'telefono',
        'correo',
        'direccion_id',
        'estatus',
        'puesto_id',
        'clinica',
        'user_id'
    ];

    //Uno a uno polimorfico
    public function historialMedico(){
        return $this->morphOne('App\Models\HistorialMedico', 'pacientable');
    }

    //Uno a uno polimorfico
    public function consulta(){
        return $this->morphOne('App\Models\Consulta', 'pacientable');
    }

     //Uno a Uno Inversa
     public function puesto(){
        return $this->belongsTo('App\Models\NomPuesto');
    }

    //Uno a Uno Inversa
     public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Uno a Muchos
    public function citas(){
        return $this->hasMany('App\Models\Cita');
    }

    //Uno a Muchos
    public function consultas(){
        return $this->hasMany('App\Models\Consultas');
    }

    //Uno a Muchos
    public function dependientes(){
        return $this->hasMany('App\Models\Externo');
    }

    //Uno a Muchos
    public function aprobaciones(){
        return $this->hasMany('App\Models\Aprobacion');
    }

    public function requisiciones(){
        return $this->hasMany('App\Models\Requisicion');
    }

    //Uno a uno polimorficab
    public function image(){
        return $this->morphOne('App\Models\Imagen', 'imageable');
    }
}
