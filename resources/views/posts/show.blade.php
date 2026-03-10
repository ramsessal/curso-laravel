@extends('layouts.app') 
@section('title', 'Post Details')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $post->titulo }}</h3>
        <div class="card-tools">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back to Posts
            </a>
        </div>
    </div>
    <div class="card-body">
        <p><strong>Author:</strong> {{ $post->autor }}</p>
        <p><strong>Status:</strong> <span class="badge badge-{{ $post
            ->estatus == 'publicado' ? 'success' : 'secondary' }}">{{ ucfirst($post->estatus) }}</span></p>
        <hr>
        <p>{{ $post->contenido }}</p>
    </div>
</div>
@endsection
