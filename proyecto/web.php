<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorioController;

Route::get('/', function () {
    return redirect('/directorio');
});

// Rutas individuales del directorio — en esta sesion las simplificaremos
Route::get('/directorio', [DirectorioController::class, 'index']);
Route::get('/directorio/crear', [DirectorioController::class, 'create']);
Route::post('/directorio', [DirectorioController::class, 'store']);
Route::get('/directorio/{id}', [DirectorioController::class, 'show']);
Route::get('/directorio/{id}/editar', [DirectorioController::class, 'edit']);
Route::put('/directorio/{id}', [DirectorioController::class, 'update']);
Route::delete('/directorio/{id}', [DirectorioController::class, 'destroy']);
