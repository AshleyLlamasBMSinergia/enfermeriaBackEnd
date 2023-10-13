<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'nickname', 'useable_id', 'useable_type',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Uno a Uno
    public function nomEmpleado(){
        return $this->hasOne('App\Models\NomEmpleado');
    }

    //Uno a Muchos
    public function citas(){
        return $this->hasMany('App\Models\Horario');
    }

    //Uno a Uno
    public function area(){
        return $this->hasOne('App\Models\HistorialMedico');
    }

    //Uno a uno polimorficab
    public function image(){
        return $this->morphOne('App\Models\Imagen', 'imageable'); //Imagen de perfi, no de usuario
    }

    public function useable(){
        return $this->morphTo();
    }
}
