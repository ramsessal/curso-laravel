<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class DirectorioController extends Controller
{

    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function show($id){
        $empleados = Empleado::all();
        $empleado = $empleados->firstWhere('id', (int) $id);
        if (!$empleado) {
            return redirect()->route('empleados.index')->with('error', 'Empleado no encontrado');
        }
        return view('empleados.show', compact('empleado'));
    }

    public function create (){
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'departamento' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:empleado,email',
            'fecha_ingreso' => 'nullable|date',
            'notes' => 'nullable|string',
            'activo' => 'nullable|boolean',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('empleados', 'public');
            $data['img'] = '/storage/' . $imagePath;
        }

        // Handle activo checkbox
        $data['activo'] = $request->has('activo') ? 1 : 0;

        $empleado = Empleado::create($data);

        return redirect()->route('empleados.show', $empleado->id)->with('success', 'Empleado creado correctamente');
    }

    public function edit($id)
    {
        $empleados = Empleado::all();
        $empleado = $empleados->firstWhere('id', (int) $id);
        if (!$empleado) {
            return redirect()->route('empleados.index')->with('error', 'Empleado no encontrado');
        }
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
            return redirect()->route('empleados.index')->with('error', 'Empleado no encontrado');
        }
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'departamento' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'fecha_ingreso' => 'nullable|date',
            'notes' => 'nullable|string',
            'activo' => 'nullable|boolean',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('img')) {
            // Delete old image if exists
            if ($empleado->img && file_exists(public_path($empleado->img))) {
                unlink(public_path($empleado->img));
            }
            $imagePath = $request->file('img')->store('empleados', 'public');
            $data['img'] = '/storage/' . $imagePath;
        }

        // Handle activo checkbox
        $data['activo'] = $request->has('activo') ? 1 : 0;

        $empleado->update($data);
        return redirect()->route('empleados.show', $empleado->id)->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
            return redirect()->route('empleados.index')->with('error', 'Empleado no encontrado');
        }
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente');
    }
}
