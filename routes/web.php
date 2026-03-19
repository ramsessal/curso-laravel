<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorioController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/saludo/{nombre}', function ($nombre) {
    return view('saludo', ['nombre' => $nombre, 'fecha' => date('Y-m-d')]);
});

// Rutas de empleados
// Route::get('/empleados', [DirectorioController::class, 'index'])->name('empleados.index');
// Route::get('/empleados/create', [DirectorioController::class, 'create'])->name('empleados.create');
// Route::post('/empleados', [DirectorioController::class, 'store'])->name('empleados.store');
// Route::get('/empleados/{id}', [DirectorioController::class, 'show'])->name('empleados.show');
// Route::get('/empleados/{id}/edit', [DirectorioController::class, 'edit'])->name('empleados.edit');
// Route::put('/empleados/{id}', [DirectorioController::class, 'update'])->name('empleados.update');
// Route::delete('/empleados/{id}', [DirectorioController::class, 'destroy'])->name('empleados.destroy');

Route::resource('empleados', DirectorioController::class);