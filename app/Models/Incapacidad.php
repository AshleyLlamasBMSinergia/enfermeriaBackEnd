<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incapacidad extends Model
{
    use HasFactory;

    protected $table = 'Incapacidades';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'tipo',
        'fechaInicial',
        'fechaTermino',
        'dias',
        'fechaProxRevision',
        'calificacionAccidente',
        'causa',
        'diagnostico',
        'empleado_id',
        'profesional_id',
    ];

    //Uno a muchos polimorfico
    public function archivos(){
        return $this->morphMany('App\Models\Archivo', 'archivable');
    }

    //Uno a Muchos Inversa
    public function empleado(){
        return $this->belongsTo('App\Models\NomEmpleado');
    }

    //Uno a Muchos Inversa
    public function profesional(){
        return $this->belongsTo('App\Models\Profesional');
    }

    //Uno a Muchos
    public function revisiones(){
        return $this->hasMany('App\Models\Revision');
    }

    //Muchos a Muchos
    public function zonasAfectadas(){
        return $this->belongsToMany('App\Models\ZonaAfectada');
    }
}
