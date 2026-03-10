<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo/{nombre}', function (string $nombre){
    return view('saludo', [
        'nombre' => $nombre, 
        'fecha' => date('d/m/Y')
    ]);
});

// rutas con malos ejemplos de como crear las rutas, no se recomienda usar este tipo de rutas

Route::get('/antro/{nombre}/{edad}', function (string $nombre, int $edad){
    return view('saludo', [
        'nombre' => $nombre, 
        'fecha' => date('d/m/Y'),
        'edad' => $edad
    ]);
});

Route::get('/tarjeta', function () {
    $empleados = [
        ['nombre' => 'Ana Garcia',    'puesto' => 'Directora',     'activo' => true, 'telefono' => '123456789', 'departamento' => 'Administración', 'correo' => 'ana.garcia@empresa.com'],
        ['nombre' => 'Carlos Lopez',  'puesto' => 'Desarrollador', 'activo' => true, 'telefono' => '987654321', 'departamento' => 'Tecnología',     'correo' => 'carlos.lopez@empresa.com'],
        ['nombre' => 'Maria Torres',  'puesto' => 'Disenadora',    'activo' => false, 'telefono' => '',         'departamento' => '',               'correo' => 'maria.torres@empresa.com'],
        ['nombre' => 'Juan Perez',    'puesto' => 'Contador',      'activo' => true,  'telefono' => '',         'departamento' => '',               'correo' => 'juan.perez@empresa.com'],
        ['nombre' => 'Laura Diaz',    'puesto' => 'Abogada',       'activo' => true,  'telefono' => '',         'departamento' => '',               'correo' => 'laura.diaz@empresa.com'],
        ['nombre' => 'Pedro Ruiz',    'puesto' => 'Analista',      'activo' => false, 'telefono'=> '',        	'departamento'=> '',               	'correo'=>	'mail@pedro.ruiz.com'],
    ];

    return view('tarjeta',
    compact('empleados'));
});

// rutas con buenos ejemplos de como crear las rutas, se recomienda usar este tipo de rutas
// Route::get('/directorio', [DirectorioController::class, 'index'])->name('directorio.index');
// Route::get('/directorio/stats', [DirectorioController::class, 'stats'])->name('directorio.stats');
// Route::get('/directorio/create', [DirectorioController::class, 'create'])->name('directorio.create');
// Route::get('/directorio/{id}', [DirectorioController::class, 'show'])->name('directorio.show');
// Route::post('/directorio', [DirectorioController::class, 'store'])->name('directorio.store');

// Mejor forma de crear rutas, se recomienda usar este tipo de rutas
Route::resource('directorio', DirectorioController::class, [
    'parameters' => ['directorio' => 'empleado']
]);