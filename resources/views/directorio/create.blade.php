@extends('layouts.app')

@section('title', 'Crear Empleado')

@section('content')
    <h1 class="page-title">Crear Empleado</h1>
    <p class="page-subtitle">Registra un nuevo perfil en el directorio.</p>

    <section class="panel form-card">
        @if ($errors->any())
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('directorio.store') }}">
            @csrf

            <div class="field">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese el nombre" required>
            </div>

            <div class="field">
                <label for="puesto">Puesto:</label>
                <input type="text" id="puesto" name="puesto" value="{{ old('puesto') }}" placeholder="Ingrese el puesto" required>
            </div>

            <div class="field">
                <label for="departamento">Departamento:</label>
                <input type="text" id="departamento" name="departamento" value="{{ old('departamento') }}" placeholder="Ingrese el departamento" required>
            </div>

            <div class="field">
                <label for="email">Correo:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Ingrese el correo" required>
            </div>

            <div class="field">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="Ingresa el teléfono" required>
            </div>

            <div class="checkbox-row">
                <input type="checkbox" id="estatus" name="estatus" value="1" {{ old('estatus') ? 'checked' : '' }}>
                <label for="estatus" style="margin: 0;">Activo</label>
            </div>

            <div class="actions" style="justify-content: flex-start; margin-top: 1.25rem;">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('directorio.index') }}" class="btn btn-neutral">Cancelar</a>
            </div>
        </form>
    </section>
@endsection