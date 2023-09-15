<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EAbdomen extends Model
{
    use HasFactory;

    protected $table = 'EAbdomenes';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'pared',
        'peristalsis',
        'visceromegalias',
        'hernias',
        'observaciones',
    ];

    //Uno a Uno
    public function examenFisico(){
        return $this->hasOne('App\Models\EFisico');
    }
}
