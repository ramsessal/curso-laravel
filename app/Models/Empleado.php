<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $fillable = [
        'nombre',
        'puesto',
        'telefono',
        'departamento',
        'email',
        'activo',
        'fecha_ingreso',
        'img',
        'notes'
    ];
}
