<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'Consultas';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $dates = ['fecha'];
    
    protected $fillable = [
        'cita_id',
        'fecha',
        'profesional_id',
        'pacientable_id',
        'pacientable_type',
        'triajeClasificacion',
        'precionDiastolica',
        'frecuenciaRespiratoria',
        'frecuenciaCardiaca',
        'edad',
        'temperatura',
        'peso',
        'talla',
        'grucemiaCapilar',
        'subjetivo',
        'objetivo',
        'analisis',
        'plan',
        'diagnostico',
        'receta',
        'pronostico',
        'incapacidad'
    ];

    public function pacientable(){
        return $this->morphTo();
    }

    //Uno a Uno Inversa
    public function cita(){
        return $this->belongsTo('App\Models\Cita');
    }

    // Uno a muchos inversa con NomEmpleado (profesional)
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'profesional_id');
    }

    public function imagenes(){
        return $this->morphMany('App\Model\Imagen', 'imageables');
    }
}
