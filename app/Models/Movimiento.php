<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'Movimientos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'folio',
        'fecha',
        'profesional_id',
        'lote_id',
        'typable_id',
        'typable_type',
    ];

    // Uno a muchos inversa
    public function lote()
    {
        return $this->belongsTo(Lote::class, 'lote_id');
    }

    // Uno a muchos inversa
    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'profesional_id');
    }

    public function typable(){
        return $this->MorphTo();
    }
}
