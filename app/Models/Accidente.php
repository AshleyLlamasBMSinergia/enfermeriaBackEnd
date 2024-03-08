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
        'empleado_id',
        'departamento_id',
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
        'costoTotalAccidente',
        'incIMSS',
        'diasIncIMSS',
        'altaST2',
        'calificacion',
        'observaciones',
        'resultado',
        'antiguedad',
        'salario',
        'turno',
        'profesional_id',
        'incapacidad_id'
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

    // Uno a muchos inversa
    public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento', 'departamento_id');
    }

    // Uno a muchos inversa
    public function empleado()
    {
        return $this->belongsTo('App\Models\NomEmpleado', 'empleado_id');
    }

    // Uno a muchos inversa con Profesional (Profesional)
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'profesional_id');
    }

    // Uno a Uno inversa
    public function incapacidad()
    {
        return $this->belongsTo('App\Models\Incapacidad', 'incapacidad_id');
    }
}
