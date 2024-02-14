<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class NomEmpleado extends Model
{
    use HasFactory;

    protected $table = 'NomEmpleados';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'numero',
        'nombre',
        'RFC',
        'CURP',
        'IMSS',
        'sexo',
        'fechaNacimiento',
        'estadoCivil',
        'telefono',
        'correo',
        'empresa_id',
        'direccion_id',
        'estatus',
        'puesto_id',
        'user_id',
        'sueldo',
        'integrado',
        'sueldo',
        'integrado'
    ];

    //Uno a uno polimorfico
    public function historialMedico(){
        return $this->morphOne('App\Models\HistorialMedico', 'pacientable');
    }

    //Uno a uno polimorfico
    public function consulta(){
        return $this->morphOne('App\Models\Consulta', 'pacientable');
    }

     //Uno a Muchos Inversa
     public function puesto(){
        return $this->belongsTo('App\Models\NomPuesto');
    }

    //Uno a uno polimorfica
    public function user(){
        return $this->morphOne('App\Models\User', 'useable');
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
        return $this->hasMany('App\Models\RHDependiente', 'empleado_id');
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

    //Uno a Muchos
    public function incapacidades(){
        return $this->hasMany('App\Models\Incapacidad', 'empleado_id');
    }
}
