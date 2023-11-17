<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alta extends Model
{
    use HasFactory;

    protected $table = 'Altas';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'revision_id',
        'profesional_id',
        'fechaFinal',
        'diasTotal',
    ];

    //Uno a uno polimorfico
    public function archivos(){
        return $this->morphMany('App\Models\Archivo', 'archivable');
    }

    //Uno a muchos Inversa
    public function profesional(){
        return $this->belongsTo('App\Models\Profesional', 'profesional_id');
    }

    //Uno a Uno Inversa
    public function revision(){
        return $this->belongsTo('App\Models\Revision', 'revision_id');
    }
}
