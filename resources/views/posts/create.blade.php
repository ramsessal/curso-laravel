@extends('layouts.app')
@section('title', 'Nuevo Post')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Nuevo Post</h3>
    </div>
    <form action="/posts" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" name="titulo"
                       class="form-control @error('titulo') is-invalid @enderror"
                       value="{{ old('titulo') }}">
                @error('titulo')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Contenido</label>
                <textarea name="contenido" rows="4"
                    class="form-control @error('contenido') is-invalid @enderror">{{ old('contenido') }}</textarea>
                @error('contenido')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="autor"
                        class="form-control @error('autor') is-invalid @enderror"
                       value="{{ old('autor') }}">
                @error('autor')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
  <!-- <label>Categoria</label>
  <select name="categoria_id"
          class="form-control">
    @foreach($categorias as $cat)
      <option value="{{ $cat->id }}">
        {{ $cat->nombre }}
      </option>
    @endforeach
  </select>
</div>--> 
            <div class="form-group">
                <label>Estatus</label>
                <select name="estatus" class="form-control @error('estatus') is-invalid @enderror">
                    <option value="borrador">Borrador</option>
                    <option value="publicado">Publicado</option>
                </select>
                @error('estatus')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Categoria</label>
                <select name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
                    <option value="">Selecciona una categoria</option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                    @endforeach
                </select>
                @error('categoria_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit"
                    class="btn btn-primary">Guardar</button>
                <a href="{{ route('posts.index', [], false) }}"
               class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection