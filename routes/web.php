<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Auth::routes();

// Rutas publicas (cualquiera puede verlas)
Route::get('/', function () {
    return redirect('/posts');
});

// Rutas protegidas (solo usuarios logueados)
Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    // Todo lo que este aqui dentro requiere login
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
