<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;



Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    // Todo lo que este aqui dentro requiere login
});


Route::get('/', function () {
    return '';
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
