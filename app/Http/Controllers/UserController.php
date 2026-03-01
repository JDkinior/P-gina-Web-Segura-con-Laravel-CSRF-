<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Este método muestra la vista del formulario
    public function create()
    {
        return view('auth.register'); 
    }

    // Este método procesa el formulario cuando le das al botón
    public function store(Request $request)
    {
        // Para tu video, solo necesitamos demostrar que la petición POST llega correctamente gracias al token CSRF
        return "¡Formulario enviado con éxito! El token CSRF funcionó.";
    }
}