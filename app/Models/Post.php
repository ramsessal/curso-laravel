<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Post extends Model
{
    protected $fillable = [
        'titulo', 'contenido', 'autor',
        'estatus', 'categoria_id',       // NUEVO
    ];

    public function categoria()       // nombre en SINGULAR
    {
        return $this->belongsTo(Categoria::class);
    }
}
