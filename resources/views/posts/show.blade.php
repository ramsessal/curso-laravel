@extends('layouts.app')
@section('title', 'Detalle del Post')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">{{ $post->titulo }}</h3>
        <span class="badge badge-{{ $post->estatus == 'publicado' ? 'success' : 'secondary' }}">
            {{ ucfirst($post->estatus) }}
        </span>
    </div>

    <div class="card-body">
        <div class="mb-3">
            <strong>Contenido</strong>
            <p class="mb-0">{{ $post->contenido }}</p>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <strong>Autor:</strong> {{ $post->autor }}
            </div>
            <div class="col-md-6 mb-2">
                <strong>Fecha:</strong> {{ $post->created_at?->format('d/m/Y H:i') }}
            </div>
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Editar</a>
    </div>
</div>
@endsection
