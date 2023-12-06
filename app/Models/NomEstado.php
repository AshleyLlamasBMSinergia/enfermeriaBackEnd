<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomEstado extends Model
{
    use HasFactory;

    protected $table = 'NomEstados';

    protected $guarded = ['id'];

    public $timestamps = false;


    protected $fillable = [
        'estado',
        'nombre',
        'clave',
    ];

    //Uno a Muchos
    public function localidades(){
        return $this->hasMany('App\Models\NomLocalidad', 'estado_id');
    }
}
