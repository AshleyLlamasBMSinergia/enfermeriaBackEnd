<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomPuesto extends Model
{
    use HasFactory;

    protected $table = 'NomPuestos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Nombre',
    ];

    //Uno a Uno
    public function nomEmpleado(){
        return $this->hasOne('App\Models\NomEmpleado');
    }
}
