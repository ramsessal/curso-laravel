<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waifu extends Model
{
    protected $fillable = [
        'nombre',
        'anime',
        'habilidad',
        'estatus',
        'fecha_ingreso',
        'notas',
    ];
}
