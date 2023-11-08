<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedi extends Model
{
    use HasFactory;
    protected $table = 'Cedis';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'nombre',
    ];

    //Uno a Muchos
    public function profesionales(){
        return $this->hasMany('App\Models\Profesional', 'cedis_id');
    }
}
