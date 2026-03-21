@extends('layouts.app')

@section('content')
    <div class="tarjeta">
        <h1>{{ $empleado->nombre }}</h1>

        <div style="width: fit-content; margin: 20px auto; text-align: left;">
            <div class="campo"><strong>Puesto:</strong> {{ $empleado->puesto }}</div>
            <div class="campo"><strong>Departamento:</strong> {{ $empleado->departamento }}</div>
            <div class="campo"><strong>Email:</strong> {{ $empleado->email }}</div>
            <div class="campo"><strong>Telefono:</strong> {{ $empleado->telefono }}</div>
            <div class="campo"><strong>Estatus:</strong> <span class="badge badge-{{ $empleado->estatus }}">{{ $empleado->estatus }}</span></div>
            <div class="campo"><strong>Fecha ingreso:</strong> {{ $empleado->fecha_ingreso }}</div>
        </div>

        <div class="acciones">
            <a href="{{ route('directorio.edit', $empleado->id) }}" class="btn-secundario">Editar</a>
            <a href="/directorio" class="btn-secundario">Volver al listado</a>

            <form method="POST" action="/directorio/{{ $empleado->id }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-base btn-danger" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>
        </div>
    </div>
@endsection