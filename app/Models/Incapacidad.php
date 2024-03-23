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
        'folio',
        'fechaEfectiva',
        'dias',
        'diagnostico',
        'TipoIncidencia',
        'TipoRiesgo',
        'Secuela',
        'ControlIncapacidad',
        'TipoPermiso',
        'causa',
        'observaciones',
        'profesional_id',
        'caso_id'
    ];

    public function nomIncidencias(){
        return $this->hasMany('App\Models\NomIncidencia');
    }    

    //Uno a Muchos
    public function accidentes(){
        return $this->hasMany('App\Models\Accidente', 'accidente_id');
    }

    //Uno a Muchos Inversa
    public function tipoIncidencia(){
        return $this->belongsTo('App\Models\NomTipoIncidencia', 'TipoIncidencia');
    }

    //Uno a Muchos Inversa
    public function tipoRiesgo(){
        return $this->belongsTo('App\Models\NomTipoRiesgo', 'TipoRiesgo');
    }

    //Uno a Muchos Inversa
    public function secuela(){
        return $this->belongsTo('App\Models\NomSecuela', 'Secuela');
    }

    //Uno a Muchos Inversa
    public function controlIncapacidad(){
        return $this->belongsTo('App\Models\NomControlIncapacidad', 'ControlIncapacidad');
    }

    //Uno a Muchos Inversa
    public function caso(){
        return $this->belongsTo('App\Models\Caso', 'caso_id');
    }

    
    //Uno a Muchos Inversa
    public function tipoPermiso(){
        return $this->belongsTo('App\Models\NomTipoPermiso', 'TipoPermiso');
    }

    //Uno a Muchos Inversa
    public function profesional(){
        return $this->belongsTo('App\Models\Profesional');
    }

    //Muchos a Muchos
    public function zonasAfectadas(){
        return $this->belongsToMany('App\Models\ZonaAfectada');
    }
}
