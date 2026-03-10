@extends('layouts.app')
@section('title', 'Nuevo Post')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Nuevo Post</h3>
    </div>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" name="titulo"
                       class="form-control"
                       value="{{ old('titulo') }}">
            </div>
            @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Contenido</label>
                <textarea name="contenido" rows="4"
                    class="form-control">{{ old('contenido') }}</textarea>
            </div>
            @error('contenido')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="autor"
                       class="form-control"
                       value="{{ old('autor') }}">
            </div>
            @error('autor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Estatus</label>
                <select name="estatus" class="form-control">
                    <option value="borrador">Borrador</option>
                    <option value="publicado">Publicado</option>
                </select>
            </div>
            @error('estatus')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Categoría</label>
                <select name="categoria_id" class="form-control">
                    <option value="">Selecciona una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach$categorias = [
        ['nombre' => 'Tecnologia', 'color' => '#007bff'],
        ['nombre' => 'Noticias',   'color' => '#28a745'],
        ['nombre' => 'Tutoriales', 'color' => '#ffc107'],
        ['nombre' => 'Opinion',    'color' => '#dc3545'],
    ];

    foreach ($categorias as $cat) {
                </select>
            </div>
            @error('categoria_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="card-footer">
            <button type="submit"
                    class="btn btn-primary">Guardar</button>
            <a href="{{ route('posts.index') }}"
               class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection