<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ECabeza extends Model
{
    use HasFactory;
    protected $table = 'ECabezas';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'craneo',
        'ojos',
        'nariz',
        'boca',
        'cuello',
        'observaciones',
    ];

    //Uno a Uno
    public function examenFisico(){
        return $this->hasOne('App\Models\EFisico');
    }
}
