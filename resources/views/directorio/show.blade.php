<!DOCTYPE html>
<html>
<head>
    <title>{{ $empleado->nombre }}</title>
    <style>
        body { background: #f7fafc; font-family: 'Segoe UI', sans-serif; padding: 20px; }
        .tarjeta { background: white; max-width: 500px; margin: 20px auto; padding: 30px;
            border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #1a365d; margin-top: 0; }
        p { margin: 8px 0; color: #4a5568; }
        a { color: #2b6cb0; margin-right: 10px; }
        .btn-danger { background: #e53e3e; color: white; padding: 8px 20px;
            border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="tarjeta">
        <h1>{{ $empleado->nombre }}</h1>

        <p><strong>Puesto:</strong> {{ $empleado->puesto }}</p>
        <p><strong>Departamento:</strong> {{ $empleado->departamento }}</p>
        <p><strong>Email:</strong> {{ $empleado->email }}</p>
        <p><strong>Telefono:</strong> {{ $empleado->telefono }}</p>
        <p><strong>Estatus:</strong> {{ $empleado->estatus }}</p>

        <a href="{{ route('directorio.edit', $empleado) }}">Editar</a>
        <a href="{{ route('directorio.index') }}">Volver al listado</a>

        <form method="POST" action="{{ route('directorio.destroy', $empleado) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">Eliminar</button>
        </form>
    </div>
</body>
</html>