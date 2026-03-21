@extends('layouts.app')
@section('title', 'Ver Post')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">{{ $post->titulo }}</h3>
        <div class="d-flex gap-1">
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-info">
                <i class="fas fa-edit"></i> Editar
            </a>

            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Eliminar este post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i> Borrar
                </button>
            </form>

            <a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
    <div class="card-body">
        <p><strong>Autor:</strong> {{ $post->autor }}</p>
        <p><strong>Categoría:</strong> 
            @if($post->categoria)
                <span class="badge" style="background-color: {{ $post->categoria->color }}">
                    {{ $post->categoria->nombre }}
                </span>
            @else
                <span class="badge badge-secondary">Sin categoría</span>
            @endif
        </p>
        <p><strong>Estatus:</strong> <span class="badge badge-{{ $post->estatus == 'publicado' ? 'success' : 'secondary' }}">{{ ucfirst($post->estatus) }}</span></p>
        <hr>
        <p>{!! nl2br(e($post->contenido)) !!}</p>
    </div>
</div>
@endsection
