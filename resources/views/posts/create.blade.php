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
                <label for="titulo">Titulo</label>
                <input id="titulo" type="text" name="titulo"
                       class="form-control @error('titulo') is-invalid @enderror"
                       value="{{ old('titulo') }}">
                @error('titulo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea id="contenido" name="contenido" rows="4"
                          class="form-control @error('contenido') is-invalid @enderror">{{ old('contenido') }}</textarea>
                @error('contenido')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select id="categoria_id" name="categoria_id"
                        class="form-control @error('categoria_id') is-invalid @enderror">
                    <option value="">Selecciona una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="estatus">Estatus</label>
                <select id="estatus" name="estatus"
                        class="form-control @error('estatus') is-invalid @enderror">
                    <option value="borrador" {{ old('estatus') === 'borrador' ? 'selected' : '' }}>Borrador</option>
                    <option value="publicado" {{ old('estatus') === 'publicado' ? 'selected' : '' }}>Publicado</option>
                </select>
                @error('estatus')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection