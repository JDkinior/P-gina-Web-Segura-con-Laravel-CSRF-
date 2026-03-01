<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; // Es buena práctica importarlo

Route::get('/', function () {
    return view('inicio');
});

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::get('/login', [UserController::class, 'create'])->name('login');
// Sintaxis corregida para el middleware y el nombre de la ruta:
Route::post('/login', [UserController::class, 'store'])->middleware('throttle:5,1')->name('login.store');