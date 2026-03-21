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
       $post=[
        [        
            'titulo' => 'Introducción a Laravel',
            'contenido' => 'Laravel hace que el desarrollo web sea una experiencia agradable.',
            'autor' => 'Admin',
            'estatus' => 'publicado',
            'categoria_id' => 1
        ],
        [
            'titulo' => 'Consejos de seguridad',
            'contenido' => 'Recuerda siempre validar los datos de entrada en tus formularios.',
            'autor' => 'Admin',
            'estatus' => 'borrador',
            'categoria_id' => 2 
        ],
        [
            'titulo' => 'Integrando MongoDB',
            'contenido' => 'Trabajar con bases de datos NoSQL ofrece mucha flexibilidad.',
            'autor' => 'Admin',
            'estatus' => 'publicado',
            'categoria_id' => 3

        ],
        [
            'titulo' => 'Docker para principiantes',
            'contenido' => 'Containerizar tus aplicaciones facilita el despliegue en cualquier entorno.',
            'autor' => 'Admin',
            'estatus' => 'publicado',
            'categoria_id' => 4
        ],
        [
            'titulo' => 'Mejores prácticas de desarrollo',
            'contenido' => 'Es importante seguir las mejores prácticas para mantener un código limpio y mantenible.',
            'autor' => 'Admin',
            'estatus' => 'borrador',
            'categoria_id' => 1
        ]

    ]; 
foreach ($post as $post) {
    Post::create($post);    
     }      
}
}