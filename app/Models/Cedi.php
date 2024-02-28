<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedi extends Model
{
    use HasFactory;
    protected $table = 'Cedis';

    protected $guarded = ['id', 'created_at', 'updated'];

    public $timestamps = false;
    
    protected $fillable = [
        'nombre',
        'empresa_id',
        'direccion_id'
    ];

    // Uno a muchos inversa
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'empresa_id');
    }

    //Uno a Muchos
    public function empleados(){
        return $this->hasMany('App\Models\NomEmpleado', 'Empresa');
    }

    //Uno a Muchos
    public function profesionales(){
        return $this->hasMany('App\Models\Profesional', 'Empresa');
    }

    //Uno a Muchos
    public function externos(){
        return $this->hasMany('App\Models\Externo', 'Empresa');
    }

    //Uno a Muchos
    public function dependientes(){
        return $this->hasMany('App\Models\RHDependiente', 'Empresa');
    }

    //Muchos a Muchos
    public function profesional(){
        return $this->belongsToMany('App\Models\Profesional');
    }
}
