<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $table = 'Salidas';
    
    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'motivo',
        'detalles',
        'inventario_id'
    ];

    //Uno a uno polimorficab
    public function movimiento(){
        return $this->morphOne('App\Models\Movimiento', 'typable');
    }

    // Uno a muchos inversa con HistorialMedico (paciente)
    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }
}
