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
        'empleado_id',
        'profesional_id',
    ];

    //Uno a Muchos
    public function nomIncidencias(){
        return $this->hasMany('App\Models\NomIncidencia');
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
    public function tipoPermiso(){
        return $this->belongsTo('App\Models\NomTipoPermiso', 'TipoPermiso');
    }

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

    //Muchos a Muchos
    public function zonasAfectadas(){
        return $this->belongsToMany('App\Models\ZonaAfectada');
    }
}
