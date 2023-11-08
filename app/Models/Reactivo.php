<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactivo extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'Reactivos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'nombre',
    ];

    //Muchos a Muchos
     public function insumos(){
        return $this->belongsToMany('App\Models\Insumo');
    }
}
