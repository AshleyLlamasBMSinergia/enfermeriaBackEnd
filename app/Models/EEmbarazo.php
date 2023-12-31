<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EEmbarazo extends Model
{
    use HasFactory;
    protected $table = 'EEmbarazos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'fecha',
        'tipo',
        'resultado',
        'comentarios',
        'historialMedico_id',
    ];

    // Uno a muchos inversa
    public function historialMedico()
    {
        return $this->belongsTo('App\Models\HistorialMedico', 'historialMedico_id');
    }
}
