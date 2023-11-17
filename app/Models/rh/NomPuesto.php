<?php

namespace App\Models\rh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NomPuesto extends Model
{
    protected $table = 'Puestos';
    protected $key = 'Puesto';

    protected $guarded = ['Puesto', 'created_at', 'updated'];

    protected $fillable = [
        'Nombre',
    ];

    static function getPuesto($id){
        return DB::connection('RecursosHumanosCAN')->table('NomPuestos')->where('Puesto', $id)->first();
    }
}
