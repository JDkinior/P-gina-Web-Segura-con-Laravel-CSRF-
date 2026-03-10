<!DOCTYPE html>
<html lang="en">
<head><title>Dashboard</title></head>
<body>
    <h1>Bienvenido al Dashboard Protegido, {{ auth()->user()->name }}!</h1>
    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>

    
</body>
</html>