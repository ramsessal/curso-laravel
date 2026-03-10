<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

/* Post Routes */
Route::middleware(['auth'])->group(function () {
    // Todo lo de adentro requiere login
    Route::resource('posts', PostController::class);
});
