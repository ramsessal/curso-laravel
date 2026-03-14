@extends('layouts.app')
@section('title', 'Posts')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Posts</h3>
        <div class="card-tools">
            <a href="/posts/create"
               class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nuevo Post
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-hover">
            <thead><tr>
                <th>Titulo</th><th>Autor</th>
                <th>Estatus</th><th>Categoria</th><th>Acciones</th>
            </tr></thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->titulo }}</td>
                    <td>{{ $post->autor }}</td>
                    <td><span class="badge badge-{{ $post->estatus == 'publicado' ? 'success' : 'secondary' }}">
                        {{ ucfirst($post->estatus) }}
                    </span></td>
                    <td>
    @if($post->categoria)
    <span class="badge"
        style="background:{{ $post->categoria->color }};
               color:white;">
        {{ $post->categoria->nombre }}
    </span>
    @endif
</td>
                    <td>
                        <a href="{{ route('posts.edit', $post, false) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('posts.destroy', $post, false) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar este post?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection