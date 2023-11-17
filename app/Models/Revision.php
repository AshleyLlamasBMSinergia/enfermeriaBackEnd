<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    protected $table = 'Revisiones';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'tipo',
        'incapacidad_id',
        'profesional_id',
        'diagnostico',
        'fecha',
        'dias',
    ];

    //Uno a uno polimorfico
    public function archivos(){
        return $this->morphMany('App\Models\Archivo', 'archivable');
    }

    //Uno a Uno
    public function alta(){
        return $this->hasOne('App\Models\Alta');
    }

    // Uno a muchos inversa
    public function incapacidad()
    {
        return $this->belongsTo('App\Models\Incapacidad', 'incapacidad_id');
    }

    //Uno a Muchos Inversa
    public function profesional(){
        return $this->belongsTo('App\Models\Profesional');
    }
}
