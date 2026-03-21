@extends('layouts.app')

@section('content')
    <h1>Nuevo Empleado</h1>

    <form method="POST" action="/directorio">
        @csrf
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        @error('nombre')
            <span style="color: red;">{{ $message }}</span>
        @enderror

        <label>Puesto</label>
        <input type="text" name="puesto" value="{{ old('puesto') }}">
        @error('puesto')
            <span style="color: red;">{{ $message }}</span>
        @enderror

        <label>Departamento</label>
        <input type="text" name="departamento" value="{{ old('departamento') }}">
        @error('departamento')
            <span style="color: red;">{{ $message }}</span>
        @enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <span style="color: red;">{{ $message }}</span>
        @enderror

        <label>Telefono</label>
        <input type="text" name="telefono" value="{{ old('telefono') }}">
        @error('telefono')
            <span style="color: red;">{{ $message }}</span>
        @enderror

        <label>Estatus</label>
        <select name="estatus">
            <option value="activo">Activo</option>
            <option value="licencia">Licencia</option>
            <option value="vacaciones">Vacaciones</option>
        </select>

        <label>Fecha de ingreso</label>
        <input type="date" name="fecha_ingreso" value="{{ old('fecha_ingreso') }}">
        @error('fecha_ingreso')
            <span style="color: red;">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn-base btn-principal">Guardar</button>
    </form>

    <a href="/directorio" class="btn-base btn-secundario">Cancelar</a>
@endsection