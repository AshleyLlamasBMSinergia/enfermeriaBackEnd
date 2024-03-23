<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;

    protected $table = 'Casos';

    protected $guarded = ['id', 'created_at', 'updated'];
    
    protected $fillable = [
        'departamento_id',
        'empleado_id',
        'accidente_id',
        'doctos',
        'estatus'
    ];

    // Uno a muchos inversa
    public function empleado()
    {
        return $this->belongsTo('App\Models\NomEmpleado', 'empleado_id');
    }

    //Uno a Muchos
    public function incapacidades(){
        return $this->hasMany('App\Models\Incapacidad');
    }

    // Uno a muchos inversa
    public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento', 'departamento_id');
    }

    // Uno a Uno inversa
    public function accidente()
    {
        return $this->belongsTo('App\Models\Accidente', 'accidente_id');
    }

    //Uno a muchos polimorfico
    public function archivos(){
        return $this->morphMany('App\Models\Archivo', 'archivable');
    }
}
