<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Post;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $categorias = [
        ['nombre' => 'Tecnologia', 'color' => '#007bff'],
        ['nombre' => 'Noticias',   'color' => '#28a745'],
        ['nombre' => 'Tutoriales', 'color' => '#ffc107'],
        ['nombre' => 'Opinion',    'color' => '#dc3545'],
    ];

    foreach ($categorias as $cat) {
        Categoria::create($cat);
    }
}
}
