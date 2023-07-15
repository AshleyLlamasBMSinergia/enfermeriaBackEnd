<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = "Consultas";

    protected $fillable = [
      'fecha',
      'HistorialMedico'
    ];
}
