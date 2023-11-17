<?php

namespace App\Models\rh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RHDependiente extends Model
{
    protected $key = 'Dependiente';

    protected $guarded = ['Dependiente', 'created_at', 'updated'];

    protected $fillable = [
        'Empleado',
        'Nombres',
        'Paterno',
        'Materno',
        'Nacimiento',
        'Sexo',
        'Parentesco',
    ];

    static function getDependiente($id){
        return DB::connection('RecursosHumanosCAN')->table('NomDependientes')->where('Dependiente', $id)->first();
    }
}
