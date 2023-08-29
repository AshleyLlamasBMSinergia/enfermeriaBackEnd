<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RHParentesco extends Model
{
    use HasFactory;

    protected $table = 'RHParentescos';
    
    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Nombre'
    ];
}
