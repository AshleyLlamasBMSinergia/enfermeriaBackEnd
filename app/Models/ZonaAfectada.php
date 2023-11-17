<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonaAfectada extends Model
{
    use HasFactory;

    protected $table = 'ZonasAfectadas';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'zona',
    ];

    //Muchos a Muchos
    public function incapacidades(){
        return $this->belongsToMany('App\Models\Incapacidad');
    }
}
