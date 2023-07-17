<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    use HasFactory;

    protected $table = 'HistorialesMedicos';

    protected $primaryKey = 'HistorialMedico';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Pacientable',
        'pacientable_type',
        'Usuario'
    ];
}
