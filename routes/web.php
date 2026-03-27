<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorioController;

Route::get('/', function () {
    return redirect('/directorio');
});

Route::redirect('/directorio/crear', '/directorio/create')->name('directorio.crear');
Route::get('/directorio/{empleado}/editar', function ($empleado) {
    return redirect(route('directorio.edit', ['empleado' => $empleado], false));
})->name('directorio.editar');


Route::resource('directorio',
    DirectorioController::class
)->parameters([
    'directorio' => 'empleado',
]);
