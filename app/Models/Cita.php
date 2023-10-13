<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'Citas';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $dates = ['fecha'];

    protected $fillable = [
        'fecha',
        'tipo',
        'color',
        'motivo',
        'paciente_id', //Historial medico
        'profesional_id'
    ];

    // Uno a muchos inversa con HistorialMedico (paciente)
    public function paciente()
    {
        return $this->belongsTo(HistorialMedico::class, 'paciente_id');
    }

    // Uno a muchos inversa con Profesional (Profesional)
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'profesional_id');
    }

    //Uno a Uno
    public function consulta(){
        return $this->hasOne('App\Models\Consulta');
    }
}
