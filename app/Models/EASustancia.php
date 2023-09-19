<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EASustancia extends Model
{
    use HasFactory;
    protected $table = 'EASustancias';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'sustancia',
        'resultado',
        'EAntidoping_id',
    ];

    // Uno a muchos inversa
    public function examenAntidoping()
    {
        return $this->belongsTo('App\Models\EAntidoping', 'EAntidoping_id');
    }
}
