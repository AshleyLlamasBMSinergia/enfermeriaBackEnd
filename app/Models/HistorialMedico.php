<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    use HasFactory;

    protected $table = 'HistorialesMedicos';

    protected $primaryKey = 'HistorialMedico';

    protected $guarded = ['created_at', 'updated'];

    protected $fillable = [
        'pacientable_id',
        'pacientable_type',
        'Usuario'
    ];

    public function pacientable(){
        return $this->morphTo();
    }

    //Uno a Uno Inversa
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario', 'Usuario');
    }

    //Uno a Muchos
    public function citas(){
        return $this->hasMany('App\Models\Cita', 'Cita');
    }
}
