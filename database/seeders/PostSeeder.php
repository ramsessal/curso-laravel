<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Categoria;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'titulo' => 'Mi primer post',
            'contenido' => 'Este es el contenido de mi primer post',
            'autor' => 'John Doe',
            'categoria_id' => 1,
            'estatus' => 'publicado'
        ]);
        Post::create([
            'titulo' => 'Mi segundo post',
            'contenido' => 'Este es el contenido de mi segundo post',
            'autor' => 'Jane Doe',
            'categoria_id' => 2,
            'estatus' => 'borrador'
        ]);
        Post::create([
            'titulo' => 'Mi tercer post',
            'contenido' => 'Este es el contenido de mi tercer post',
            'autor' => 'John Smith',
            'categoria_id' => 3,
            'estatus' => 'publicado'
        ]);
        Post::create([
            'titulo' => 'Mi cuarto post',
            'contenido' => 'Este es el contenido de mi cuarto post',
            'autor' => 'Jane Smith',
            'categoria_id' => 4,
            'estatus' => 'borrador'
        ]);
        Post::create([
            'titulo' => 'Mi quinto post',
            'contenido' => 'Este es el contenido de mi quinto post',
            'autor' => 'John Doe',
            'categoria_id' => 2,
            'estatus' => 'publicado'
        ]);

        foreach (range(1, 2) as $i) {
            Post::create([
                'titulo' => "Post de ejemplo {$i}",
                'contenido' => "Contenido del post de ejemplo {$i}",
                'autor' => "Autor {$i}",
                'categoria_id' => 1,
                'estatus' => $i % 2 == 0 ? 'publicado' : 'borrador',
                'categoria_id' => Categoria::inRandomOrder()->first()->id, // Asigna una categoría aleatoria
            ]);
        }
    }
}
