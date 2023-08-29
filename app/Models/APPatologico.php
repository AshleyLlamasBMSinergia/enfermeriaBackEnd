<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APPatologico extends Model
{
    use HasFactory;

    protected $table = 'APPatologicos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'cirujias',
        //Esp de especificar
        'espCirujias',

        'contusiones',
        'espContusiones',

        'lumbalgias',
        'espLumbalgias',

        'hernias',
        'espHernias',

        'fracturas',
        'espFracturas',

        'dorsalgias',
        'espDorsalgias',

        'hospitalizaciones',
        'espHospitalizaciones',

        'esguinces',
        'espEsguinces',

        'lesionesArteriales',
        'espLesionesArteriales',

        'transfusiones',
        'espTransfusiones',

        'luxaciones',
        'espLuxaciones',

        'tetanias',
        'espTetanias',

        'alergias',
        'espAlergias',

        'asma',
        'epilepsia',

        //Enf de enfermedades
        'enfDentales',
        'espEnfDentales',

        'enfOpticas',
        'espEnfOpticas',

        //Alt de alteraciones
        'altPsicologicas',
        'espAltPsicologicas',
    ];

    //Uno a Uno
    public function historialMedico(){
        return $this->hasOne('App\Models\HistorialMedico');
    }
}
