<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empleado;

class DirectorioController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
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
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|min:2|max:255',
            'puesto' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'estatus' => 'nullable|boolean',
        ]);

        // Convertir el checkbox estatus a booleano
        $validated['estatus'] = $request->has('estatus');

        // Crear el empleado en la base de datos
        Empleado::create($validated);

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('directorio.index')->with('success', 'Empleado creado exitosamente');
    }
    
    public function edit(Empleado $empleado)
    {
        return view('directorio.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|min:2|max:255',
            'puesto' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'estatus' => 'nullable|boolean',
        ]);

        // Convertir el checkbox estatus a booleano
        $validated['estatus'] = $request->has('estatus');

        // Actualizar el empleado en la base de datos
        $empleado->update($validated);

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('directorio.index')->with('success', 'Empleado actualizado exitosamente');
    }

    public function destroy(Empleado $empleado)
    {
        // Eliminar el empleado de la base de datos
        $empleado->delete();

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('directorio.index')->with('success', 'Empleado eliminado exitosamente');
    }
    
    public function stats()
    {
        $totalEmpleados = Empleado::count();
        $empleadosActivos = Empleado::where('estatus', true)->count();
        return view('directorio.stats', compact("totalEmpleados", "empleadosActivos"));
    }
}
