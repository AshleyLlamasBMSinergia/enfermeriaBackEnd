<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AHeredofamiliar extends Model
{
    use HasFactory;

    protected $table = 'AHeredofamiliares';

    protected $guarded = ['id', 'created_at', 'updated'];

    //Uno a Uno
    public function historialMedico(){
        return $this->hasOne('App\Models\HistorialMedico', 'HistorialMedico');
    }
}
