<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    use HasFactory;
    protected $table = 'Requisiciones';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'folio',
        'fecha',
        'empleado_id',
        'autorizacion_id',
        'seguimiento_id',
    ];

    // Uno a muchos inversa con NomEmpleado (empleado)
    public function empleado()
    {
        return $this->belongsTo(NomEmpleado::class, 'empleado_id');
    }

    // Uno a muchos inversa (autorizacion)
    public function autorizacion()
    {
        return $this->belongsTo(Aprobacion::class, 'autorizacion_id');
    }

    // Uno a muchos inversa (autorizacion)
    public function seguimiento()
    {
        return $this->belongsTo(Aprobacion::class, 'seguimiento_id');
    }
}
