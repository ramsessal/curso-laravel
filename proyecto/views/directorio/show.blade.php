<!DOCTYPE html>
<html>
<head>
    <title>{{ $empleado['nombre'] }}</title>
    <style>
        body {
            background: #f7fafc;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
        }
        .tarjeta {
            background: white;
            max-width: 500px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h1 {
            color: #1a365d;
            margin-top: 0;
        }
        .campo {
            margin: 12px 0;
            color: #4a5568;
        }
        .campo strong {
            color: #1a365d;
            display: inline-block;
            width: 120px;
        }
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 0.85em;
            font-weight: 600;
        }
        .badge-activo { background: #c6f6d5; color: #22543d; }
        .badge-vacaciones { background: #fed7d7; color: #742a2a; }
        .badge-licencia { background: #fefcbf; color: #744210; }
        .acciones {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
        }
        a {
            color: #2b6cb0;
            text-decoration: none;
            margin-right: 10px;
        }
        .btn-danger {
            background: #e53e3e;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="tarjeta">
        <h1>{{ $empleado['nombre'] }}</h1>

        <div class="campo"><strong>Puesto:</strong> {{ $empleado['puesto'] }}</div>
        <div class="campo"><strong>Departamento:</strong> {{ $empleado['departamento'] }}</div>
        <div class="campo"><strong>Email:</strong> {{ $empleado['email'] }}</div>
        <div class="campo"><strong>Telefono:</strong> {{ $empleado['telefono'] }}</div>
        <div class="campo"><strong>Estatus:</strong> <span class="badge badge-{{ $empleado['estatus'] }}">{{ $empleado['estatus'] }}</span></div>
        <div class="campo"><strong>Fecha ingreso:</strong> {{ $empleado['fecha_ingreso'] }}</div>

        <div class="acciones">
            <a href="/directorio/{{ $empleado['id'] }}/editar">Editar</a>
            <a href="/directorio">Volver al listado</a>

            <form method="POST" action="/directorio/{{ $empleado['id'] }}" style="display: inline; margin-left: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</body>
</html>
