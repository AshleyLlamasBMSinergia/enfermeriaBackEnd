<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RHDependiente extends Model
{
    use HasFactory;

    protected $table = 'RHDependientes';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'empleado_id',
        'nombre',
        'sexo',
        'fechaNacimiento',
        'parentesco',
        'estatus',
        'cedi_id'
    ];

    //Uno a uno polimorfico
    public function historialMedico(){
        return $this->morphOne('App\Models\HistorialMedico', 'pacientable');
    }

    //Uno a uno polimorfico
    public function consulta(){
        return $this->morphOne('App\Models\Consulta', 'pacientable');
    }

    //Uno a Muchos
    public function consultas(){
        return $this->hasMany('App\Models\Consulta', 'id');
    }

    // Uno a muchos inversa
    public function empleado()
    {
        return $this->belongsTo('App\Models\NomEmpleado', 'empleado_id');
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
