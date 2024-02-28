<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'Empresas';

    protected $primaryKey  = 'id';

    
    protected $keyType = 'integer';


    protected $guarded = ['id'];

    public $timestamps = false;

    protected $fillable = [
        'Empresa',
        'RFC',
        'Nombre',
        'NombreLargo',
        'Path',
        'Path2',
    ];

    //Uno a Muchos
    public function cedis(){
        return $this->hasMany('App\Models\Cedi');
    }
}
