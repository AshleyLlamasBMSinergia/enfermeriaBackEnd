<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ETorax extends Model
{
    use HasFactory;

    protected $table = 'EToraxs';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'camposPulmonares',
        'ampAmplex',
        'ruidoPulmonar',
        'transVoz',
        'areaPrecordial',
        'FC',
        'tono',
        'ritmo',
        'observaciones',
    ];

    //Uno a Uno
    public function examenFisico(){
        return $this->hasOne('App\Models\EFisico');
    }
}
