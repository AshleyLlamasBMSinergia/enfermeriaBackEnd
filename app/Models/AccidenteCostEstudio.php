<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccidenteCostEstudio extends Model
{
    use HasFactory;

    protected $table = 'AccidenteCostEstudios';

    protected $guarded = ['id'];

    public $timestamps = false;
    
    protected $fillable = [
        'descripcion',
        'monto',
        'accidente_id'
    ];

    // Uno a muchos inversa
    public function accidente()
    {
        return $this->belongsTo('App\Models\Accidente', 'accidente_id');
    }
}
