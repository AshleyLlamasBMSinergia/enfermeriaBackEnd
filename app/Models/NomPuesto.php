<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomPuesto extends Model
{
    use HasFactory;

    protected $table = 'NomPuestos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Nombre',
    ];

    //Uno a muchos
    public function empleados(){
        return $this->hasMany('App\Models\NomEmpleado');
    }

    //Uno a muchos
    public function profesionales(){
        return $this->hasMany('App\Models\Profesionales');
    }
}
