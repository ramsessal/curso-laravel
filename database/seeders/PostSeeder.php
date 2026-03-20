<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'titulo' => 'Bienvenido al blog',
                'contenido' => 'Este es el primer post del blog. Aquí compartiremos noticias y tutoriales.',
                'autor' => 'Admin',
                'estatus' => 'publicado',
                'categoria_id' => 1,
            ],
            [
                'titulo' => 'Cómo empezar con Laravel',
                'contenido' => 'Laravel es un framework PHP elegante. En este post veremos los primeros pasos.',
                'autor' => 'María',
                'estatus' => 'publicado',
                'categoria_id' => 3,
            ],
            [
                'titulo' => 'Novedades del mes',
                'contenido' => 'Repasamos las noticias más importantes del ecosistema.',
                'autor' => 'Juan',
                'estatus' => 'borrador',
                'categoria_id' => 2,
            ],
            [
                'titulo' => 'Consejos y trucos',
                'contenido' => 'Algunos atajos y buenas prácticas para ser más productivo.',
                'autor' => 'Laura',
                'estatus' => 'publicado',
                'categoria_id' => 3,
            ],
            [
                'titulo' => 'Opinión: El futuro de PHP',
                'contenido' => 'Reflexiones sobre hacia dónde va PHP y qué esperar en los próximos años.',
                'autor' => 'Carlos',
                'estatus' => 'publicado',
                'categoria_id' => 4,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
