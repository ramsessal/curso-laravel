<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Empleado</title>
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

    <form method="POST" action="{{ route('directorio.store', [], false) }}">
        @csrf
        <label>Nombre</label>
        <input type="text" name="nombre">

        <label>Puesto</label>
        <input type="text" name="puesto">

        <label>Departamento</label>
        <input type="text" name="departamento">

        <label>Email</label>
        <input type="email" name="email">

        <label>Telefono</label>
        <input type="text" name="telefono">

        <label>Estatus</label>
        <select name="estatus">
            <option value="activo">Activo</option>
            <option value="licencia">Licencia</option>
            <option value="vacaciones">Vacaciones</option>
        </select>

        <label>Fecha de ingreso</label>
        <input type="date" name="fecha_ingreso">

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('directorio.index', [], false) }}">Cancelar</a>
</body>
</html>
