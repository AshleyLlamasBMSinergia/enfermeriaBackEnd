<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AHeredofamiliar extends Model
{
    use HasFactory;

    protected $table = 'AHeredofamiliares';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'padresViven',
        'espPadresViven',
        
        'hermanosViven',
        'hermanasViven',

        'diabetes',
        'espDiabetes',

        'obecidad',
        'espObecidad',

        'hipertensionArterial',
        'espHipertensionArterial',

        'psoriasisVitiligo',
        'espPsoriasisVitiligo',

        'cardiopatias',
        'espCardiopatias',

        'lepra',
        'espLepra',

        'neoplasicos',
        'espNeoplasicos',

        'fimicos',
        'espFimicos',
        
        'tiroideos',
        'espTiroideos',

        'psiquiatricos',
        'espPsiquiatricos',

        'alergias',
        'espAlergias',

        'colagenopatias',
        'espColagenopatias',

        'probMentales',
        'espProbMentales',

        'otros',
    ];

    //Uno a Uno
    public function historialMedico(){
        return $this->hasOne('App\Models\HistorialMedico');
    }
}
