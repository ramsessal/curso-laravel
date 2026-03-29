<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::with('categoria');

        if ($search = $request->query('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('titulo', 'like', "%{$search}%")
                  ->orWhere('contenido', 'like', "%{$search}%")
                  ->orWhere('autor', 'like', "%{$search}%");
            });
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = \App\Models\Categoria::all();
        return view('posts.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:3',
            'contenido' => 'required|min:10',
            'estatus' => 'required|in:publicado,borrador',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Post::create($request->only(['titulo', 'contenido', 'estatus', 'categoria_id']) + ['autor' => Auth::user()->name]);
        return redirect()->route('posts.index')->with('success', 'Post creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('posts.show', ['post' => Post::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categorias = \App\Models\Categoria::all();
        return view('posts.edit', compact('post', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'autor' => 'required',
            'estatus' => 'required|in:publicado,borrador',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->only(['titulo', 'contenido', 'autor', 'estatus', 'categoria_id']));

        return redirect()->route('posts.index')->with('success', 'Post actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post eliminado exitosamente.');
    }
}
