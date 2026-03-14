<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorioController;

Route::get('/', function () {
    return redirect('/directorio');
});


Route::resource('directorio',
    DirectorioController::class
);
