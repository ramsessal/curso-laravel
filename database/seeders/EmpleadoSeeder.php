<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empleado::create([
        'nombre'       => 'Ana Garcia',
        'puesto'       => 'Desarrolladora',
        'departamento' => 'Tecnologia',
        'email'        => 'ana@empresa.com',
        'telefono'     => '555-0101',
        'estatus'      => 'activo',
        'fecha_ingreso' => '2023-03-15',
    ]);
    }
}
