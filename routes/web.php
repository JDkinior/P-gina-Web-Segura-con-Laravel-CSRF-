<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::get('/login', [UserController::class, 'create'])->name('login');
Route::post('/login', [UserController::class, 'store'])->Route::middleware('throtle:5,1');
-> name('login.store');
    