<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'Departamentos';

    protected $guarded = ['id'];

    public $timestamps = false;
    
    protected $fillable = [
        'departamento',
        'nombre',
        'grupo',
        'depto',
        'cedi_id'
    ];

    //Uno a Muchos
    public function consultas(){
        return $this->hasMany('App\Models\Consulta', 'id');
    }

    //Uno a Muchos
    public function accidentes(){
        return $this->hasMany('App\Models\Consulta', 'id');
    }
}
