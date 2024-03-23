<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accidente extends Model
{
    use HasFactory;

    protected $table = 'Accidentes';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $dates = ['fecha'];
    
    protected $fillable = [
        'fecha',
        'lugar',
        'descripcion',
        'diagnostico_id',
        'causa',
        'canalizado',
        'clinica',
        'diasIncInterna',
        'costoIncInterna',
        'costoEstudio',
        'costoConsulta',
        'costoMedicamento',
        'calificacion',
        'observaciones',
        'resultado',
        'antiguedad',
        'salario',
        'turno',
        'profesional_id',
    ];

    // Uno a mucho inversa
    public function diagnostico()
    {
        return $this->belongsTo('App\Models\Diagnostico', 'diagnostico_id');
    }

    // Uno a mucho
    public function accidenteCostEstudios()
    {
        return $this->hasMany('App\Models\AccidenteCostEstudio');
    }

    // Uno a muchos inversa con Profesional (Profesional)
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'profesional_id');
    }

    // Uno a muchos inversa
    public function incapacidad()
    {
        return $this->belongsTo('App\Models\Incapacidad', 'incapacidad_id');
    }
}
