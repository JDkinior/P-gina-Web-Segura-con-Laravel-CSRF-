<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('inicio');
});

// Rutas para usuarios NO autenticados (invitados)
Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'showRegister'])->name('register');
    Route::post('/register', [UserController::class, 'registerStore'])->name('register.store');
    
    Route::get('/login', [UserController::class, 'showLogin'])->name('login');
    // Aplicamos throttle: 5 intentos por minuto para mitigar fuerza bruta
    Route::post('/login', [UserController::class, 'loginStore'])->middleware('throttle:5,1')->name('login.store');
});

// Rutas protegidas para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});