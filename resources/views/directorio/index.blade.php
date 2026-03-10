@extends('layouts.app')

@section('title', 'Directorio de Empleados')

@section('content')
    <h1 class="page-title">Directorio de Empleados</h1>
    <p class="page-subtitle">Consulta, edita y administra tu equipo en un solo lugar.</p>

    <div class="actions" style="margin-bottom: 1.2rem;">
        <a href="{{ route('directorio.create') }}" class="btn btn-primary">Nuevo Empleado</a>
    </div>

    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    <section class="cards-grid">
        @foreach ($empleados as $empleado)
            <article class="panel profile-card">
                <h2 style="margin-bottom: 0.7rem;">Tarjeta de presentación</h2>
                <img class="avatar" src="https://i.pinimg.com/1200x/b5/00/36/b50036cdd092b7548813033883ddc9af.jpg" alt="Foto de {{ $empleado->nombre }}">

                <span class="status {{ $empleado->estatus ? 'activo' : 'inactivo' }}">
                    {{ $empleado->estatus ? 'Activo' : 'Inactivo' }}
                </span>

                <h3 style="margin-bottom: 0.6rem;">{{ $empleado->nombre }}</h3>
                <p class="inline-data"><strong>Puesto:</strong> {{ $empleado->puesto }}</p>
                <p class="inline-data"><strong>Teléfono:</strong> {{ $empleado->telefono }}</p>
                <p class="inline-data"><strong>Departamento:</strong> {{ $empleado->departamento }}</p>

                @if ($empleado->email)
                    <a href="mailto:{{ $empleado->email }}" class="btn btn-success" style="margin-top: 0.8rem;">Enviar mensaje</a>
                @endif

                <div class="actions">
                    <a href="{{ route('directorio.edit', ['empleado' => $empleado->id]) }}" class="btn btn-primary">Editar</a>
                    <form method="POST" action="{{ route('directorio.destroy', ['empleado' => $empleado->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este empleado?')">Eliminar</button>
                    </form>
                </div>
            </article>
        @endforeach
    </section>
@endsection
