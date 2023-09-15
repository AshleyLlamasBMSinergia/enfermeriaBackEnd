<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprobacion extends Model
{
    use HasFactory;

    protected $table = 'Aprobaciones';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'estatus',
        'motivo',
        'empleado_id',
    ];

    // Uno a muchos inversa con NomEmpleado (empleado)
    public function empleado()
    {
        return $this->belongsTo(NomEmpleado::class, 'empleado_id');
    }

    //Uno a Uno
    public function requisicion(){
        return $this->hasOne('App\Models\Requisicion');
    }
}
