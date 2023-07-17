<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'Consultas';

    protected $primaryKey = 'Consulta';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Cita',
        'Fecha',
        'Profesional',
        'Pacientable',
        'TriajeClasificacion',
        'PrecionDiastolica',
        'FrecuenciaRespiratoria',
        'FrecuenciaCardiaca',
        'Temperatura',
        'Peso',
        'Talla',
        'GrucemiaCapilar',
        'Subjetivo',
        'Objetivo',
        'Analisis',
        'Plan',
        'Diagnostico',
        'Receta',
        'Pronostico',
        'Incapacidad'
    ];
}
