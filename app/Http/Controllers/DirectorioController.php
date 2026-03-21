<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class DirectorioController extends Controller
{
   
 public function index()
{
    $empleados = Empleado::all();

    return view('directorio.index',
        compact('empleados'));
}

    public function show($id)
{
    $empleado = Empleado::findOrFail($id);
    return view('directorio.show', compact('empleado'));
}

    public function create()
    {
        return view('directorio.create');
    }

    public function store(Request $request)
{
    // 1. Definir las reglas
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

    return redirect()->route('directorio.index')->with('success', 'Empleado creado correctamente');
}

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('directorio.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $validated = $request->validate([
        'nombre'        => 'required|min:2',
        'puesto'        => 'required',
        'departamento'  => 'required',
        'email'         => 'required|email',
        'telefono'      => 'nullable',
        'estatus'       => 'required|in:activo,licencia,vacaciones',
        'fecha_ingreso' => 'required|date',
    ]);

        $empleado->update($validated);

    return redirect()->route('directorio.index')->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect('/directorio')->with('success', 'Empleado eliminado correctamente');
    }
}
