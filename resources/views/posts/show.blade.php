@extends('layouts.app')
@section('title', $post->titulo)

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $post->titulo }}</h3>
        <div class="card-tools">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm">Volver</a>
        </div>
    </div>
    <div class="card-body">
        <p><strong>Contenido:</strong></p>
        <p>{{ $post->contenido }}</p>
        <p><strong>Autor:</strong> {{ $post->autor }}</p>
        <p><strong>Estatus:</strong> <span class="badge badge-{{ $post->estatus == 'publicado' ? 'success' : 'secondary' }}">{{ ucfirst($post->estatus) }}</span></p>
        <p><strong>Fecha de creación:</strong> {{ $post->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Categoría:</strong> {{ $post->categoria->nombre }}</p>
    </div>
</div>
@endsection