<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    protected $table = 'Imagenes';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'Foto',
        'Categoria',
        'imageable_id',
        'imageable_type'
    ];

    public function imageable(){
        return $this->MorphTo();
    }

    public function imageables(){
        return $this->MorphTo();
    }
}
