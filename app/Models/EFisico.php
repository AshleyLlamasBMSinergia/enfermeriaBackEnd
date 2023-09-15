<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EFisico extends Model
{
    use HasFactory;

    protected $table = 'EFIsicos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $dates = ['fecha'];

    protected $fillable = [
        'fecha',
        'TA',
        'FR',
        'peso',
        'TC',
        'temperatura',
        'talla',
        'estadoConciencia',
        'coordinacion',
        'equilibrio',
        'marcha',
        'orientacion',
        'orientacionTiempo',
        'orientacionPersona',
        'orientacionEspacio',
        'EOrganoSentido_id',
        'ECabeza_id',
        'ETorax_id',
        'EAbdomen_id',
        'EExtremidad_id',
        'EColumnaVertebral_id',
        'historialMedico_id'
    ];

    // Uno a muchos inversa
    public function historialMedico()
    {
        return $this->belongsTo('App\Models\HistorialMedico', 'historialMedico_id');
    }

    //Uno a Uno Inversa
    public function organoSentido(){
        return $this->belongsTo('App\Models\EOrganoSentido');
    }

    //Uno a Uno Inversa
    public function cabeza(){
        return $this->belongsTo('App\Models\ECabeza');
    }

    //Uno a Uno Inversa
    public function torax(){
        return $this->belongsTo('App\Models\ETorax');
    }

    //Uno a Uno Inversa
    public function abdomen(){
        return $this->belongsTo('App\Models\EAbdomen');
    }

    //Uno a Uno Inversa
    public function extremidad(){
        return $this->belongsTo('App\Models\EExtremidad');
    }

    //Uno a Uno Inversa
    public function columnaVertebral(){
        return $this->belongsTo('App\Models\EColumnaVertebral');
    }
}
