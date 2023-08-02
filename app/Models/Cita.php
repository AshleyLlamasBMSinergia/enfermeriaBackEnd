<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'Citas';

    protected $primaryKey = 'Cita';

    protected $guarded = ['created_at', 'updated'];

    protected $dates = ['Fecha'];

    protected $fillable = [
        'Fecha',
        'Tipo',
        'Color',
        'Motivo',
        'Paciente',
        'Profesional'
    ];

    // Uno a muchos inversa con HistorialMedico (Paciente)
    public function paciente()
    {
        return $this->belongsTo(HistorialMedico::class, 'Paciente', 'HistorialMedico');
    }

    // Uno a muchos inversa con NomEmpleado (Profesional)
    public function profesional()
    {
        return $this->belongsTo(NomEmpleado::class, 'Profesional', 'Empleado');
    }

    //Uno a Uno
    public function consulta(){
        return $this->hasOne('App\Models\Consulta', 'Consulta');
    }
}
