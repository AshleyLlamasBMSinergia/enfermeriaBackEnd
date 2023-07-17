<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'Citas';

    protected $primaryKey = 'Cita';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Fecha',
        'Tipo',
        'Motivo',
        'Paciente',
        'Profesional'
    ];
}
