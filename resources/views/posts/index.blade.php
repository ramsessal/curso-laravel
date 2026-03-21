@extends('layouts.app')
@section('title', 'Posts')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Posts</h3>
        <div class="card-tools">
            <form action="{{ route('posts.index') }}" method="GET" class="input-group input-group-sm" style="width: 320px;">
                <input type="text" name="q" class="form-control float-right" placeholder="Buscar..." value="{{ request('q') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm ml-2">
                <i class="fas fa-plus"></i> Nuevo Post
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-hover">
            <thead><tr>
                <th>Titulo</th><th>Autor</th>
                <th>Categoría</th><th>Estatus</th><th>Acciones</th>
            </tr></thead>
            <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{ $post->titulo }}</td>
                    <td>{{ $post->autor }}</td>
                    <td>
                        @if($post->categoria)
                            <span class="badge" style="background-color: {{ $post->categoria->color }}">
                                {{ $post->categoria->nombre }}
                            </span>
                        @else
                            <span class="badge badge-secondary">Sin categoría</span>
                        @endif
                    </td>
                    <td><span class="badge badge-{{ $post->estatus == 'publicado' ? 'success' : 'secondary' }}">
                        {{ ucfirst($post->estatus) }}
                    </span></td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye"></i> Ver
                        </a>

                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Eliminar este post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
                        <p class="text-muted">No hay posts todavía</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        {{ $posts->links() }}
    </div>
</div>
@endsection