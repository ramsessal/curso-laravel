@extends('layouts.app')

@section('title', 'Detalles del Empleado')

@section('content')
    <h1 class="page-title">Detalles del Empleado</h1>

    <section class="panel centered profile-card">
        <img class="avatar" src="https://i.pinimg.com/1200x/b5/00/36/b50036cdd092b7548813033883ddc9af.jpg" alt="Foto de {{ $empleado['nombre'] }}">
        <h2 style="margin-bottom: 1rem;">{{ $empleado['nombre'] }}</h2>
        <p class="inline-data"><strong>Puesto:</strong> {{ $empleado['puesto'] }}</p>
        <p class="inline-data"><strong>Departamento:</strong> {{ $empleado['departamento'] }}</p>
        <p class="inline-data"><strong>Teléfono:</strong> {{ $empleado['telefono'] }}</p>
        <p class="inline-data"><strong>Correo:</strong> {{ $empleado['correo'] }}</p>
        <p class="status {{ $empleado['activo'] ? 'activo' : 'inactivo' }}">
            {{ $empleado['activo'] ? 'Activo' : 'Inactivo' }}
        </p>
    </section>
@endsection