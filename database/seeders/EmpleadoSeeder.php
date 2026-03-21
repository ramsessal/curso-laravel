<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    public function run(): void
{
    $empleados = [
        ['nombre' => 'Ana Garcia', 'puesto' => 'Desarrolladora',
         'departamento' => 'Tecnologia', 'email' => 'ana@empresa.com',
         'telefono' => '555-0101', 'estatus' => 'activo',
         'fecha_ingreso' => '2023-03-15'],
        ['nombre' => 'Carlos Lopez', 'puesto' => 'Disenador UI',
         'departamento' => 'Diseno', 'email' => 'carlos@empresa.com',
         'telefono' => '555-0102', 'estatus' => 'activo',
         'fecha_ingreso' => '2023-06-01'],
        ['nombre' => 'Maria Rodriguez', 'puesto' => 'Coordinadora',
         'departamento' => 'RRHH', 'email' => 'maria@empresa.com',
         'telefono' => '555-0103', 'estatus' => 'vacaciones',
         'fecha_ingreso' => '2022-01-10'],
        ['nombre' => 'Pedro Martinez', 'puesto' => 'DevOps',
         'departamento' => 'Tecnologia', 'email' => 'pedro@empresa.com',
         'telefono' => '555-0104', 'estatus' => 'licencia',
         'fecha_ingreso' => '2024-02-20'],
        ['nombre' => 'Laura Sanchez', 'puesto' => 'Contadora',
         'departamento' => 'Finanzas', 'email' => 'laura@empresa.com',
         'telefono' => '555-0105', 'estatus' => 'activo',
         'fecha_ingreso' => '2023-09-01'],
    ];

    foreach ($empleados as $emp) {
        Empleado::create($emp);
    }
}
}
