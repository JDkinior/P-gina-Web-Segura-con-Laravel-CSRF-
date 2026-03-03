<!DOCTYPE html>
<html lang="en">
<head><title>Registro</title></head>
<body>
    <h1>Registro</h1>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <label>Nombre:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br>

        <label>Confirmar Contraseña:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>