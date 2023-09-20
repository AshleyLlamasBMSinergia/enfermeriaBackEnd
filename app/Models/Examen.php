<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $table = 'Examenes';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'tipo',
        'categoria',
        'descripcion',
        'historialMedico_id'
    ];

    // Uno a muchos inversa
    public function historialMedico()
    {
        return $this->belongsTo('App\Models\HistorialMedico');
    }

    //Uno a uno polimorfico
    public function archivos(){
        return $this->morphMany('App\Models\Archivo', 'archivable');
    }
}
