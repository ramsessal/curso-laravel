@extends('layouts.app')
@section('title', 'Posts')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Posts</h3>
        <div class="card-tools d-flex align-items-center">
            <form action="{{ route('posts.index') }}" method="GET" class="form-inline mr-2">
                <div class="input-group input-group-sm">
                    <input type="text" name="q" class="form-control" placeholder="Buscar título o autor"
                           value="{{ old('q', $search ?? '') }}">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nuevo Post
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Autor</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{ $post->titulo }}</td>
                    <td>
                        @if($post->categoria)
                            <span class="badge" style="background: {{ $post->categoria->color }}; color: white;">
                                {{ $post->categoria->nombre }}
                            </span>
                        @endif
                    </td>
                    <td>{{ $post->autor }}</td>
                    <td>
                        <span class="badge badge-{{ $post->estatus == 'publicado' ? 'success' : 'secondary' }}">
                            {{ ucfirst($post->estatus) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este post?');" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
                        No hay posts todavía.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $posts->links() }}
    </div>
</div>
@endsection