@extends('layouts.app')

@section('content')
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

        <button type="submit" class="btn-base btn-principal">Actualizar</button>
    </form>

    <a href="/directorio" class="btn-base btn-secundario">Cancelar</a>
@endsection
