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
        //Post
        $post = [

            [
                'titulo' => 'Primer Post',
                'contenido' => 'Este es el contenido del primer post.',
                'autor' => 'Juan Pérez',
                'estatus' => 'publicado',
                'categoria_id' => 1,
            ],
            [
                'titulo' => 'Segundo Post',
                'contenido' => 'Este es el contenido del segundo post.',
                'autor' => 'María Gómez',
                'estatus' => 'borrador',
                'categoria_id' => 2,

            ],
            [
                'titulo' => 'Tercer Post',
                'contenido' => 'Este es el contenido del tercer post.',
                'autor' => 'Carlos Rodríguez',
                'estatus' => 'publicado',
                'categoria_id' => 3,
            ],
            [
                'titulo' => 'Cuarto Post',
                'contenido' => 'Este es el contenido del cuarto post.',
                'autor' => 'Ana Martínez',
                'estatus' => 'borrador',
                'categoria_id' => 4,
            ],
            [
                'titulo' => 'Quinto Post',
                'contenido' => 'Este es el contenido del quinto post.',
                'autor' => 'Luis Fernández',
                'estatus' => 'publicado',
                'categoria_id' => 1,
            ],
        ];

        foreach ($post as $p) {
            Post::create($p);
        }

    }
}
