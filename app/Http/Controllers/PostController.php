<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categoria;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('categoria')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('posts.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'    => 'required|min:3',
            'contenido' => 'required|min:10',
            'autor'     => 'required',
            'estatus'   => 'required|in:borrador,publicado',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')
                         ->with('success', 'Post creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $categorias = Categoria::all();
        return view('posts.show', compact('post', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categorias = Categoria::all();
        return view('posts.edit', compact('post', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo'    => 'required|min:3',
            'contenido' => 'required|min:10',
            'autor'     => 'required',
            'estatus'   => 'required|in:borrador,publicado',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('posts.index')
                         ->with('success', 'Post actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Post eliminado exitosamente.');
    }
}
