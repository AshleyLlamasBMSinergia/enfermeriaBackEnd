<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EAntidoping extends Model
{
    use HasFactory;
    protected $table = 'EAntidopings';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'fecha',
        'tipo',
        'examen',
        'historialMedico_id',
    ];

    // Uno a muchos inversa
    public function historialMedico()
    {
        return $this->belongsTo('App\Models\HistorialMedico', 'historialMedico_id');
    }

    //Uno a Muchos
    public function sustancias(){
        return $this->hasMany('App\Models\EASustancia', 'EAntidoping_id');
    }
}
