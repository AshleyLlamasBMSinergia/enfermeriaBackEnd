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
        'user',
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
        return $this->belongsTo('App\Models\APPatologico');
    }

    //Uno a Uno Inversa
    public function antecedentesPersonalesNoPatologicos(){
        return $this->belongsTo('App\Models\APNPatologico');
    }

    //Uno a Uno Inversa
    public function antecedentesHeredofamiliares(){
        return $this->belongsTo('App\Models\AHeredofamiliar');
    }

    //Uno a Muchos
    public function citas(){
        return $this->hasMany('App\Models\Cita');
    }
}
