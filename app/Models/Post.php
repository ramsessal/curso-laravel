<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titulo',
        'contenido',
        'autor',
        'estatus',
        'categoria_id',
    ];

    public function categoria()       // nombre en SINGULAR
    {
        return $this->belongsTo(Categoria::class);
    }
}
