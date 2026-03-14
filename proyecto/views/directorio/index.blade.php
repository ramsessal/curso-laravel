<!DOCTYPE html>
<html>
<head>
    <title>Directorio de Empleados</title>
    <style>
        body {
            background: #f7fafc;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #1a365d;
            text-align: center;
        }
        .contenedor {
            max-width: 900px;
            margin: 0 auto;
        }
        .btn-nuevo {
            display: inline-block;
            background: #2b6cb0;
            color: white;
            padding: 8px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th {
            background: #1a365d;
            color: white;
            padding: 12px 10px;
            text-align: left;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:hover {
            background: #f0f4f8;
        }
        a {
            color: #2b6cb0;
            text-decoration: none;
            margin-right: 8px;
        }
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 0.8em;
            font-weight: 600;
        }
        .badge-activo { background: #c6f6d5; color: #22543d; }
        .badge-vacaciones { background: #fed7d7; color: #742a2a; }
        .badge-licencia { background: #fefcbf; color: #744210; }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Directorio de Empleados</h1>
        <a href="/directorio/crear" class="btn-nuevo">+ Nuevo Empleado</a>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Departamento</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado['nombre'] }}</td>
                    <td>{{ $empleado['puesto'] }}</td>
                    <td>{{ $empleado['departamento'] }}</td>
                    <td><span class="badge badge-{{ $empleado['estatus'] }}">{{ $empleado['estatus'] }}</span></td>
                    <td>
                        <a href="/directorio/{{ $empleado['id'] }}">Ver</a>
                        <a href="/directorio/{{ $empleado['id'] }}/editar">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
