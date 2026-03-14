@extends('layouts.app')
@section('content')
<html>
<head>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f7fafc;
            max-width: 500px;
            margin: 40px auto;
            padding: 0 20px;
        }
        h1 {
            color: #1a365d;
        }
        label {
            display: block;
            font-weight: bold;
            margin-top: 12px;
            color: #4a5568;
        }
        input, select {
            padding: 8px;
            width: 100%;
            margin-top: 4px;
            border: 1px solid #cbd5e0;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background: #2b6cb0;
            color: white;
            padding: 10px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 1em;
        }
        button:hover {
            background: #2c5282;
        }
        a {
            color: #2b6cb0;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Nuevo Empleado</h1>

    <form method="POST" action="/directorio">
        @csrf

        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="{{ $errors->has('nombre') ? 'input-error' : '' }}" required>
            @error('nombre')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Puesto</label>
            <input type="text" name="puesto" value="{{ old('puesto') }}" class="{{ $errors->has('puesto') ? 'input-error' : '' }}" required>
            @error('puesto')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Departamento</label>
            <input type="text" name="departamento" value="{{ old('departamento') }}" class="{{ $errors->has('departamento') ? 'input-error' : '' }}" required>
            @error('departamento')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'input-error' : '' }}" required>
            @error('email')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Telefono</label>
            <input type="text" name="telefono" value="{{ old('telefono') }}" class="{{ $errors->has('telefono') ? 'input-error' : '' }}" required>
            @error('telefono')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Estatus</label>
            <select name="estatus" class="{{ $errors->has('estatus') ? 'input-error' : '' }}" required>
                <option value="activo" {{ old('estatus') == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="licencia" {{ old('estatus') == 'licencia' ? 'selected' : '' }}>Licencia</option>
                <option value="vacaciones" {{ old('estatus') == 'vacaciones' ? 'selected' : '' }}>Vacaciones</option>
            </select>
            @error('estatus')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Fecha de ingreso</label>
            <input type="date" name="fecha_ingreso" value="{{ old('fecha_ingreso') }}" class="{{ $errors->has('fecha_ingreso') ? 'input-error' : '' }}" required>
            @error('fecha_ingreso')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Guardar</button>
    </form>

    <a href="/directorio">Cancelar</a>
</div>
@endsection
