@extends('layouts.app')

@section('title', 'Tarjetas')

@section('content')
    <h1 class="page-title">Tarjetas de presentación</h1>

    <section class="cards-grid">
        @foreach ($empleados as $empleado)
            <article class="panel profile-card">
                <h2 style="margin-bottom: 0.7rem;">Tarjeta de presentación</h2>

                <img class="avatar" src="https://i.pinimg.com/1200x/b5/00/36/b50036cdd092b7548813033883ddc9af.jpg" alt="Foto de {{ $empleado['nombre'] }}">

                @if ($empleado['activo'])
                    <span class="status activo">Activo</span>
                @else
                    <span class="status inactivo">Inactivo</span>
                @endif

                <h3>Nombre: {{ $empleado['nombre'] }}</h3>
                <p class="inline-data"><strong>Puesto:</strong> {{ $empleado['puesto'] }}</p>
                <p class="inline-data"><strong>Telefono:</strong> {{ $empleado['telefono'] }}</p>
                <p class="inline-data"><strong>Departamento:</strong> {{ $empleado['departamento'] }}</p>

                @if ($empleado['correo'])
                    <a href="mailto:{{ $empleado['correo'] }}" target="_blank" class="btn btn-success" style="margin-top: 0.85rem;">Enviar mensaje</a>
                @endif
            </article>
        @endforeach
    </section>
@endsection
