@extends('layouts.app')
@section('title', 'Ver Post')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $post->titulo }}</h3>
        <div class="card-tools">
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-chevron-left"></i> Volver
            </a>
        </div>
    </div>

    <div class="card-body">
        <p><strong>Autor:</strong> {{ $post->autor }}</p>
        <p><strong>Categoria:</strong>
            @if($post->categoria)
                <span class="badge" style="background: {{ $post->categoria->color }}; color: white;">
                    {{ $post->categoria->nombre }}
                </span>
            @else
                <span class="text-muted">Sin categoría</span>
            @endif
        </p>
        <p><strong>Estatus:</strong>
            <span class="badge badge-{{ $post->estatus == 'publicado' ? 'success' : 'secondary' }}">
                {{ ucfirst($post->estatus) }}
            </span>
        </p>
        <p><strong>Creado:</strong> {{ $post->created_at->format('d/m/Y H:i') }}</p>

        <hr>

        <div>
            {!! nl2br(e($post->contenido)) !!}
        </div>
    </div>
</div>
@endsection
