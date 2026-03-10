<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'titulo', 'contenido', 'autor',
        'estatus', 'categoria_id',       // NUEVO
    ];

    public function categoria()       // nombre en SINGULAR
    {
        return $this->belongsTo(Categoria::class);
    }
}
