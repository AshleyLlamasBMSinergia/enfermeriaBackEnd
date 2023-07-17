<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APNPatologico extends Model
{
    use HasFactory;

    protected $table = 'APNPpatologicos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Anticonceptivos',
        //Esp de especificar
        'EspAnticonceptivos',

        'Obstetrico',
        'Menarca',
        'Alcoholismo',
        'Tabaquismo',
        'Toxicomanias',
        'Religion',
        'Pasatiempos',
        'TipoYRH', //Tipo y RH

        'Inmunizaciones',
        'EspInmunizaciones',

        'Alimentacion',
        'EspAlimentacion',

        'AseoPersonal',
        'Deportes',
        'EspDeportes',

        'Bajo',
        'SobrePeso',
        'Hacinamiento',
        'Promiscuidad',
    ];
}
