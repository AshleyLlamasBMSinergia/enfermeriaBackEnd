<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Model
{
    use HasFactory, Notifiable;

    protected $table = "Usarios";

    protected $primaryKey = 'Usuario';

    protected $fillable = [
        'Password',
        'Nivel',
        'Plaza',
        'Bloqueo',
        'Admin',
        'Gerente',
        'Correo',
        'CedulaProfesional'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}