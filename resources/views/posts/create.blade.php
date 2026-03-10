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
                       class="form-control"
                       value="{{ old('titulo') }}">
                @error('titulo')
                    <span class="is-invalid">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Contenido</label>
                <textarea name="contenido" rows="4"
                    class="form-control">{{ old('contenido') }}</textarea>
                    @error('contenido')
                    <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="autor"
                       class="form-control"
                       value="{{ old('autor') }}">
                @error('autor')
                    <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Estatus</label>
                <select name="estatus" class="form-control">
                    <option value="borrador">Borrador</option>
                    <option value="publicado">Publicado</option>
                </select>
                @error('estatus')
                    <span class="is-invalid">{{ $message }}</span>
                @enderror
            </div>
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