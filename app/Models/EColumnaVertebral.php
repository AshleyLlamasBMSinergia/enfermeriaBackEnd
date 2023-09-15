<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EColumnaVertebral extends Model
{
    use HasFactory;
    protected $table = 'EColumnasVertebrales';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'lordosis',
        'flexion',
        'lateralizacion',
        'puntosDolor',
        'xifosis',
        'extension',
        'rotacion',
        'otros',
        'observaciones',
    ];

    //Uno a Uno
    public function examenFisico(){
        return $this->hasOne('App\Models\EFisico');
    }
}
