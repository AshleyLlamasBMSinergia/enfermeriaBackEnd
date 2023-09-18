<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EExtremidad extends Model
{
    use HasFactory;

    protected $table = 'EExtremidades';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'toraxicas',
        'hombro',
        'codo',
        'muneca',
        'pie',
        'movilidad',
        'pelvicas',
        'cadera',
        'rodilla',
        'tobillo',
        'mano',
        'fuerza',
        'observaciones',
    ];

    //Uno a Uno
    public function examenFisico(){
        return $this->hasOne('App\Models\EFisico');
    }
}
