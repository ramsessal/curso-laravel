<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpeladoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $img = 'https://www.qcosas.com/wp-content/uploads/2014/05/mapache-saludando.jpg';

        $empleados = [
            ['img' => $img, 'nombre' => 'Juan Perez', 'puesto' => 'Gerente', 'telefono' => '555-1234', 'departamento' => 'Ventas', 'email' => 'juan.perez@empresa.com', 'activo' => true, 'fecha_ingreso' => '2020-01-15'],
            ['img' => $img, 'nombre' => 'Maria Lopez', 'puesto' => 'Diseñadora Gráfica', 'telefono' => '555-5678', 'departamento' => 'Diseño', 'email' => 'maria.lopez@empresa.com', 'activo' => false, 'fecha_ingreso' => '2019-03-22'],
            ['img' => $img, 'nombre' => 'Carlos Sanchez', 'puesto' => 'Analista de Datos', 'telefono' => '555-9012', 'departamento' => 'Analítica', 'email' => 'carlos.sanchez@empresa.com', 'activo' => true, 'fecha_ingreso' => '2021-06-10'],
            ['img' => $img, 'nombre' => 'Ana Gomez', 'puesto' => 'Gerente de Proyectos', 'telefono' => '555-3456', 'departamento' => 'Proyectos', 'email' => 'ana.gomez@empresa.com', 'activo' => false, 'fecha_ingreso' => '2018-11-05'],
            ['img' => $img, 'nombre' => 'Luis Rodriguez', 'puesto' => 'Especialista en Marketing', 'telefono' => '555-7890', 'departamento' => 'Marketing', 'email' => 'luis.rodriguez@empresa.com', 'activo' => true, 'fecha_ingreso' => '2022-02-28'],
            ['img' => $img, 'nombre' => 'Sofia Martinez', 'puesto' => 'Desarrolladora Frontend', 'telefono' => '555-2345', 'departamento' => 'Desarrollo', 'email' => 'sofia.martinez@empresa.com', 'activo' => false, 'fecha_ingreso' => '2020-09-14'],
            ['img' => $img, 'nombre' => 'Diego Hernandez', 'puesto' => 'Administrador de Sistemas', 'telefono' => '555-6789', 'departamento' => 'Sistemas', 'email' => 'diego.hernandez@empresa.com', 'activo' => true, 'fecha_ingreso' => '2019-07-20'],
            ['img' => $img, 'nombre' => 'Laura Ramirez', 'puesto' => 'Especialista en Recursos Humanos', 'telefono' => '555-0123', 'departamento' => 'Recursos Humanos', 'email' => 'laura.ramirez@empresa.com', 'activo' => false, 'fecha_ingreso' => '2021-04-17'],
            ['img' => $img, 'nombre' => 'Jorge Torres', 'puesto' => 'Analista Financiero', 'telefono' => '555-4567', 'departamento' => 'Finanzas', 'email' => 'jorge.torres@empresa.com', 'activo' => true, 'fecha_ingreso' => '2020-12-03'],
            ['img' => $img, 'nombre' => 'Marta Flores', 'puesto' => 'Diseñadora UX/UI', 'telefono' => '555-8901', 'departamento' => 'Diseño', 'email' => 'marta.flores@empresa.com', 'activo' => false, 'fecha_ingreso' => '2022-08-25'],
        ];

        foreach ($empleados as $empleado) {
            Empleado::create($empleado);
        }
    }
}