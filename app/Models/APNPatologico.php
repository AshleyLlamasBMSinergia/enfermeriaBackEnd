<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APNPatologico extends Model
{
    use HasFactory;

    protected $table = 'APNPatologicos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'anticonceptivos',
        //Esp de especificar
        'espAnticonceptivos',

        'obstetrico',
        'espObstetrico',

        'menarca',
        'espMenarca',

        'alcoholismo',
        'espAlcoholismo',

        'tabaquismo',
        'espTabaquismo',

        'toxicomanias',
        'espToxicomanias',

        'religion',
        'espReligion',


        'pasatiempos',
        'tipoYRH', //Tipo y RH

        'inmunizaciones',
        'espInmunizaciones',

        'alimentacion',
        
        'aseoPersonal',
        
        'deportes',
        'espDeportes',

        'bajo',
        'sobrePeso',
        'hacinamiento',
        'promiscuidad',
    ];

    //Uno a Uno
    public function historialMedico(){
        return $this->hasOne('App\Models\HistorialMedico');
    }
}
