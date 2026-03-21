@extends('layouts.app')
@section('title', 'Ver Post')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $post->titulo }}</h3>
        <div class="card-tools">
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Editar
            </a>
            <form action="/posts/{{ $post->id }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </form>
            <a href="/posts" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Atrás
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
                <h5><strong>Autor:</strong></h5>
                <p>{{ $post->autor }}</p>
            </div>
            <div class="col-md-4">
                <h5><strong>Estatus:</strong></h5>
                <p><span class="badge badge-{{ $post->estatus == 'publicado' ? 'success' : 'secondary' }}">
                    {{ ucfirst($post->estatus) }}
                </span></p>
            </div>
            <div class="col-md-4">
                <h5><strong>Categoría:</strong></h5>
                <p><span class="badge" style="background-color: {{ $post->categoria->color ?? '#ccc' }}; color: white;">
                    {{ $post->categoria->nombre ?? 'Sin categoría' }}
                </span></p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <h5><strong>Contenido:</strong></h5>
                <p>{{ $post->contenido }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h6><strong>Fecha de creación:</strong></h6>
                <p>{{ $post->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
