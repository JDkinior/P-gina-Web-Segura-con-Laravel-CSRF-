<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegister() { 
        return view('auth.register'); 
    }
    
    public function showLogin() { 
        return view('auth.login'); 
    }

    public function registerStore(Request $request)
    {
        // 1. Validación server-side
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Creación y Hashing
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Contraseña hasheada
        ]);

        // 3. Login automático y redirección
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function loginStore(Request $request)
    {
        // 1. Validación server-side
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Intento de autenticación
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // Invalidar sesión y regenerar token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}