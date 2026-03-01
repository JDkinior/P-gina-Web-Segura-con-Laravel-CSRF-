<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Register</h1>
    <form action="{{ route('register.store') }}" method="POST">
        
        @csrf  <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Correo:</label>
        <input type="email" name="email" id="email" required><br><br>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>