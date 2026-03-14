<!DOCTYPE html>
<html>
<head>
    <title>Editar: {{ $empleado['nombre'] }}</title>
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
    <h1>Editar: {{ $empleado['nombre'] }}</h1>

    <form method="POST" action="/directorio/{{ $empleado['id'] }}">
        @csrf
        @method('PUT')

        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $empleado['nombre'] }}">

        <label>Puesto</label>
        <input type="text" name="puesto" value="{{ $empleado['puesto'] }}">

        <label>Departamento</label>
        <input type="text" name="departamento" value="{{ $empleado['departamento'] }}">

        <label>Email</label>
        <input type="email" name="email" value="{{ $empleado['email'] }}">

        <label>Telefono</label>
        <input type="text" name="telefono" value="{{ $empleado['telefono'] }}">

        <label>Estatus</label>
        <select name="estatus">
            <option value="activo" {{ $empleado['estatus'] == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="licencia" {{ $empleado['estatus'] == 'licencia' ? 'selected' : '' }}>Licencia</option>
            <option value="vacaciones" {{ $empleado['estatus'] == 'vacaciones' ? 'selected' : '' }}>Vacaciones</option>
        </select>

        <label>Fecha de ingreso</label>
        <input type="date" name="fecha_ingreso" value="{{ $empleado['fecha_ingreso'] }}">

        <button type="submit">Actualizar</button>
    </form>

    <a href="/directorio">Cancelar</a>
</body>
</html>
