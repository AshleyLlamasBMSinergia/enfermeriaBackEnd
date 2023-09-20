<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    use HasFactory;

    protected $table = 'HistorialesMedicos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'pacientable_id',
        'pacientable_type',
        'user_id',
        'APPatologicos_id',
        'APNPpatologicos_id',
        'AHeredofamiliares_id'
    ];

    public function pacientable(){
        return $this->morphTo();
    }

    //Uno a Uno Inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Uno a Uno Inversa
    public function antecedentesPersonalesPatologicos(){
        return $this->belongsTo('App\Models\APPatologico', 'APPatologicos_id');
    }

    //Uno a Uno Inversa
    public function antecedentesPersonalesNoPatologicos(){
        return $this->belongsTo('App\Models\APNPatologico', 'APNPatologicos_id');
    }

    //Uno a Uno Inversa
    public function antecedentesHeredofamiliares(){
        return $this->belongsTo('App\Models\AHeredofamiliar', 'AHeredofamiliares_id');
    }

    //Uno a Muchos
    public function citas(){
        return $this->hasMany('App\Models\Cita');
    }

    //Uno a Muchos
    public function examenesFisicos(){
        return $this->hasMany('App\Models\EFisico', 'historialMedico_id');
    }

    //Uno a Muchos
    public function examenesAntidoping(){
        return $this->hasMany('App\Models\EAntidoping', 'historialMedico_id');
    }
    
    //Uno a Muchos
    public function examenesEmbarazo(){
        return $this->hasMany('App\Models\EEmbarazo', 'historialMedico_id');
    }

    //Uno a Muchos
    public function examenesVista(){
        return $this->hasMany('App\Models\EVista', 'historialMedico_id');
    }

     //Uno a Muchos
     public function examenes(){
        return $this->hasMany('App\Models\Examen', 'historialMedico_id');
    }

    //Uno a uno polimorfico
    public function archivos(){
        return $this->morphMany('App\Models\Archivo', 'archivable');
    }
}
