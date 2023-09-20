<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $table = 'Lotes';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'lote',
        'fechaCaducidad',
        'fechaIngreso',
        'piezasDisponibles',
        'insumos_id',
    ];

    //Uno a Muchos Inversa
    public function insumo()
    {
        return $this->belongsTo(NomEmpleado::class, 'insumo_id');
    }
}
