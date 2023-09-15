<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOrganoSentido extends Model
{
    use HasFactory;

    protected $table = 'EOrganosSentidos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'vista',
        'oido',
        'olfato',
        'tacto',
        'observaciones',
    ];

    //Uno a Uno
    public function examenFisico(){
        return $this->hasOne('App\Models\EFisico');
    }
}
