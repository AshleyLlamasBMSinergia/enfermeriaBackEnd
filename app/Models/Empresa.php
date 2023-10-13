<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'Empresas';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'grupo',
    ];
}
