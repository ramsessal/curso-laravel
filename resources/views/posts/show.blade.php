@extends('layouts.app')
@section('title', 'Posts')

@section('content')

<section class="content">
    <div class="container-fluid">
        <article class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $post->titulo }}</h3>
                <div class="card-tools">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro?')">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <p><strong>Autor:</strong> {{ $post->autor }}</p>
                <p><strong>Categoría:</strong> {{ $post->categoria->nombre ?? 'Sin categoría' }}</p>
                <p><strong>Estatus:</strong> <span class="badge badge-{{ $post->estatus == 'publicado' ? 'success' : 'secondary' }}">{{ ucfirst($post->estatus) }}</span></p>
                <hr>
                <p>{{ $post->contenido }}</p>
            </div>
        </article>
    </div>
</section>

@endsection