@extends('layouts.app')
@section('title', 'Posts')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Posts</h3>
        <div class="card-tools">
            <a href="{{ route('posts.create') }}"
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
            @forelse($posts as $post)
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
                    <td class="d-flex" style="gap: 6px;">
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Deseas eliminar este post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-3">No hay posts registrados.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
