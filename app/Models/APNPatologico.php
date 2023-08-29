<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APNPatologico extends Model
{
    use HasFactory;

    protected $table = 'APNPpatologicos';

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
        'tabaquismo',
        'toxicomanias',
        'religion',
        'pasatiempos',
        'tipoYRH', //Tipo y RH

        'inmunizaciones',
        'espInmunizaciones',

        'alimentacion',
        'espAlimentacion',

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
