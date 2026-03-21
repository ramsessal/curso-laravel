@extends('layouts.app')
@section('title', 'Editar Post')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editar Post</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="titulo">Título</label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                       id="titulo" name="titulo" value="{{ old('titulo', $post->titulo) }}" required>
                @error('titulo')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="autor">Autor</label>
                <input type="text" class="form-control @error('autor') is-invalid @enderror" 
                       id="autor" name="autor" value="{{ old('autor', $post->autor) }}" required>
                @error('autor')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="contenido">Contenido</label>
                <textarea class="form-control @error('contenido') is-invalid @enderror" 
                          id="contenido" name="contenido" rows="6" required>{{ old('contenido', $post->contenido) }}</textarea>
                @error('contenido')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="estatus">Estatus</label>
                <select class="form-control @error('estatus') is-invalid @enderror" 
                        id="estatus" name="estatus" required>
                    <option value="borrador" {{ old('estatus', $post->estatus) == 'borrador' ? 'selected' : '' }}>Borrador</option>
                    <option value="publicado" {{ old('estatus', $post->estatus) == 'publicado' ? 'selected' : '' }}>Publicado</option>
                </select>
                @error('estatus')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="categoria_id">Categoría</label>
                <select class="form-control @error('categoria_id') is-invalid @enderror" 
                        id="categoria_id" name="categoria_id" required>
                    <option value="">Selecciona una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id', $post->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar cambios
                </button>
                <a href="/posts" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
