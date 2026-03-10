<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required','string','max:80'],
            'email'    => ['required','email','max:255','unique:users,email'],
            'password' => ['required','string','min:8','confirmed'],
        ]);
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'message' => 'Registro exitoso',
            'token'   => $token,
            'user'    => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email],
        ], 201);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string'],
        ]);
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'Credenciales incorrectas.',
            ]);
        }
        // opcional: eliminar tokens anteriores para "1 sesión por dispositivo"
        // $user->tokens()->delete();
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'message' => 'Login exitoso',
            'token'   => $token,
        ]);
    }
    public function logout(Request $request)
    {
        // revoca el token actual
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout exitoso']);
    }
}