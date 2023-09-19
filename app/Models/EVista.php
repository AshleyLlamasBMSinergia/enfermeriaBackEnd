<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EVista extends Model
{
    use HasFactory;
    protected $table = 'EVistas';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'fecha',
        'tipo',
        'necesitaLentes',
        'usaLentes',
        'comentarios',
        'historialMedico_id',
    ];

    // Uno a muchos inversa
    public function historialMedico()
    {
        return $this->belongsTo('App\Models\HistorialMedico', 'historialMedico_id');
    }
}
