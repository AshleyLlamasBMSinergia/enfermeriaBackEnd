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
        'pacientable_id',
        'pacientable_type',
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

    public function pacientable(){
        return $this->morphTo();
    }

    //Uno a Uno Inversa
    public function cita(){
        return $this->belongsTo('App\Models\Cita', 'Cita');
    }

    // Uno a muchos inversa con NomEmpleado (Profesional)
    public function profesional()
    {
        return $this->belongsTo(NomEmpleado::class, 'Profesional', 'Empleado');
    }
}
