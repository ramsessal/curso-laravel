@extends('layouts.app')
@section('title', 'Editar Post')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Editar Post</h3>
    </div>
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" name="titulo"
                       class="form-control @error('titulo') is-invalid @enderror"
                       value="{{ old('titulo', $post->titulo) }}">
                       @error('titulo')
                        <small class="text-danger">{{ $message }}</small>
                       @enderror
            </div>
            <div class="form-group">
                <label>Contenido</label>
                <textarea name="contenido" rows="4"
                    class="form-control @error('contenido') is-invalid @enderror">{{ old('contenido', $post->contenido) }}</textarea>
                    @error('contenido')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="autor"
                       class="form-control @error('autor') is-invalid @enderror"
                       value="{{ old('autor', $post->autor) }}">
                       @error('autor')
                        <small class="text-danger">{{ $message }}</small>
                       @enderror
            </div>
            <div class="form-group">
                <label>Estatus</label>
                <select name="estatus" class="form-control">
                    <option value="borrador" {{ old('estatus', $post->estatus) === 'borrador' ? 'selected' : '' }}>Borrador</option>
                    <option value="publicado" {{ old('estatus', $post->estatus) === 'publicado' ? 'selected' : '' }}>Publicado</option>
                </select>
            </div>
            <div class="form-group">
                <label>Categoria</label>
                <select name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
                    <option value="">Selecciona una categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id', $post->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <small class="text-danger">{{ $message }}</small>
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
