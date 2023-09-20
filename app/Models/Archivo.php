<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $table = 'Archivos';

    protected $guarded = ['id', 'created_at', 'updated'];

    protected $fillable = [
        'url',
        'categoria',
        'archivable_id',
        'archivable_type'
    ];

    public function archivable(){
        return $this->MorphTo();
    }

    public function archivables(){
        return $this->MorphTo();
    }
}
