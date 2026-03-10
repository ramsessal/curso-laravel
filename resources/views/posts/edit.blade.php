@extends('layouts.app')
@section('title', 'Editar Post')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editar Post</h3>
    </div>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group">
                <label>Titulo <span class="text-danger">*</span></label>
                <input type="text" name="titulo"
                       class="form-control @error('titulo') is-invalid @enderror"
                       value="{{ old('titulo', $post->titulo) }}">
                @error('titulo')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Contenido <span class="text-danger">*</span></label>
                <textarea name="contenido" rows="4"
                    class="form-control @error('contenido') is-invalid @enderror">{{ old('contenido', $post->contenido) }}</textarea>
                @error('contenido')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Autor <span class="text-danger">*</span></label>
                <input type="text" name="autor"
                       class="form-control @error('autor') is-invalid @enderror"
                       value="{{ old('autor', $post->autor) }}">
                @error('autor')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Estatus <span class="text-danger">*</span></label>
                <select name="estatus" class="form-control @error('estatus') is-invalid @enderror">
                    <option value="borrador" @selected(old('estatus', $post->estatus) == 'borrador')>Borrador</option>
                    <option value="publicado" @selected(old('estatus', $post->estatus) == 'publicado')>Publicado</option>
                </select>
                @error('estatus')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Categoria</label>
                <select name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
                    <option value="">-- Sin Categoria --</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" @selected(old('categoria_id', $post->categoria_id) == $cat->id)>
                            {{ $cat->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
