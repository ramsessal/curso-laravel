<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    /**
     * Datos hardcoded — en esta sesion los migraremos a base de datos
     */
    private function getEmpleados()
    {
        return [
            1 => [
                'id' => 1,
                'nombre' => 'Ana Garcia',
                'puesto' => 'Directora de Sistemas',
                'departamento' => 'Tecnologia',
                'email' => 'ana.garcia@ejemplo.com',
                'telefono' => '555-0101',
                'estatus' => 'activo',
                'fecha_ingreso' => '2020-03-15',
            ],
            2 => [
                'id' => 2,
                'nombre' => 'Carlos Lopez',
                'puesto' => 'Desarrollador Senior',
                'departamento' => 'Tecnologia',
                'email' => 'carlos.lopez@ejemplo.com',
                'telefono' => '555-0102',
                'estatus' => 'activo',
                'fecha_ingreso' => '2021-06-01',
            ],
            3 => [
                'id' => 3,
                'nombre' => 'Maria Rodriguez',
                'puesto' => 'Coordinadora de RRHH',
                'departamento' => 'Recursos Humanos',
                'email' => 'maria.rodriguez@ejemplo.com',
                'telefono' => '555-0103',
                'estatus' => 'vacaciones',
                'fecha_ingreso' => '2019-01-10',
            ],
            4 => [
                'id' => 4,
                'nombre' => 'Roberto Sanchez',
                'puesto' => 'Contador General',
                'departamento' => 'Finanzas',
                'email' => 'roberto.sanchez@ejemplo.com',
                'telefono' => '555-0104',
                'estatus' => 'activo',
                'fecha_ingreso' => '2022-09-20',
            ],
            5 => [
                'id' => 5,
                'nombre' => 'Laura Martinez',
                'puesto' => 'Diseñadora UX',
                'departamento' => 'Tecnologia',
                'email' => 'laura.martinez@ejemplo.com',
                'telefono' => '555-0105',
                'estatus' => 'licencia',
                'fecha_ingreso' => '2023-02-14',
            ],
        ];
    }

    public function index()
    {
        $empleados = $this->getEmpleados();
        return view('directorio.index', compact('empleados'));
    }

    public function show($id)
    {
        $empleados = $this->getEmpleados();
        $empleado = $empleados[$id];
        return view('directorio.show', compact('empleado'));
    }

    public function create()
    {
        return view('directorio.create');
    }

    public function store(Request $request)
    {
        // Por ahora solo mostramos lo que llego — no se guarda en ningun lado
        dd($request->all());
    }

    public function edit($id)
    {
        $empleados = $this->getEmpleados();
        $empleado = $empleados[$id];
        return view('directorio.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        // Por ahora solo mostramos lo que llego — no se guarda
        dd($request->all());
    }

    public function destroy($id)
    {
        // Por ahora no hace nada — no hay donde borrar
        dd("Eliminar empleado $id — pero no hay base de datos todavia");
    }
}
