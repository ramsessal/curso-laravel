<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

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
        $empleados = Empleado::all();   // Ahora PHP sabe que es "Empleado"
        return view('directorio.index', compact('empleados'));
    }

    public function show(Empleado $empleado)
    {
        return view('directorio.show', compact('empleado'));
    }

    public function create()
    {
        return view('directorio.create');
    }

    public function store(Request $request)
  
{
   $validated = $request->validate([
        'nombre'        => 'required|min:2',  // obligatorio, min 2 letras
        'puesto'        => 'required',
        'departamento'  => 'required',
        'email'         => 'required|email',  // obligatorio + formato email
        'telefono'      => 'nullable',        // opcional
        'estatus'       => 'required|in:activo,licencia,vacaciones',
        'fecha_ingreso' => 'required|date',
    ]);

    // 2. Si llega aqui, TODO paso la validacion
    Empleado::create($validated);

    return redirect(route('directorio.index', [], false))
                     ->with('success', 'Empleado creado');
    }

    public function edit(Empleado $empleado)
    {
        return view('directorio.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
{
    $empleado->update($request->all());

    return redirect(route('directorio.index', [], false));
}

public function destroy(Empleado $empleado)
{
    $empleado->delete();

    return redirect(route('directorio.index', [], false));
}
}
