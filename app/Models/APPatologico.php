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
        'Cirujias',
        //Esp de especificar
        'EspCirujias',

        'Contusiones',
        'EspContusiones',

        'Lumbalgias',
        'EspLumbalgias',

        'Hernias',
        'EspHernias',

        'Fracturas',
        'EspFracturas',

        'Dorsalgias',
        'EspDorsalgias',

        'Hospitalizaciones',
        'EspHospitalizaciones',

        'Esguinces',
        'EspEsguinces',

        'LesionesArteriales',
        'EspLesionesArteriales',

        'Transfusiones',
        'EspTransfusiones',

        'Luxaciones',
        'EspLuxaciones',

        'Tetanias',
        'EspTetanias',

        'Alergias',
        'EspAlergias',

        'Asma',
        'Epilepsia',

        //Enf de enfermedades
        'EnfDentales',
        'EspEnfDentales',

        'EnfOticas',
        'EspEnfOticas',

        //Alt de alteraciones
        'AltPsicologicas',
        'EspAltPsicologicas',
    ];
}
