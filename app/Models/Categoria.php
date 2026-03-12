<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'color'];

    public function posts()          // nombre en PLURAL
    {
        return $this->hasMany(Post::class);
    }
}
