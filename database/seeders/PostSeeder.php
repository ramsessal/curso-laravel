<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            ['titulo' => 'Mi primer post', 'contenido' => 'Hola mundo', 'autor' => 'Admin', 'estatus' => 'publicado', 'categoria_id' => 1],
            ['titulo' => 'Mi segundo post', 'contenido' => 'Hola todos', 'autor' => 'Admin', 'estatus' => 'publicado', 'categoria_id' => 2],
            ['titulo' => 'Mi tercero post', 'contenido' => 'Hola Cristian', 'autor' => 'Brandon', 'estatus' => 'publicado', 'categoria_id' => 3],
            ['titulo' => 'Mi cuarto post', 'contenido' => 'Hola Oscar', 'autor' => 'Cristian', 'estatus' => 'publicado', 'categoria_id' => 4],
            ['titulo' => 'Mi quinto post', 'contenido' => 'Hola Brandon', 'autor' => 'Oscar', 'estatus' => 'publicado', 'categoria_id' => 1],
            ['titulo' => 'Mi sexto post', 'contenido' => 'Hola Everyone', 'autor' => 'Admin', 'estatus' => 'publicado', 'categoria_id' => 2]
        ];

        foreach ($posts as $post) {
        Post::create($post);
    }
    }
}
