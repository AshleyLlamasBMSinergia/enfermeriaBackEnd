<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendiente extends Model
{
    use HasFactory;

    protected $table = 'Pendientes';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'fecha',
        'titulo',
        'estatus',
        'profesional_id'
    ];

    //Uno a Muchos Inversa
    public function profesional(){
        return $this->belongsTo('App\Models\Profesional');
    }
}
