<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | OctavoApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
        }
        .btn-primary:hover {
            background-color: #5548c8;
            border-color: #5548c8;
        }
        .form-control:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="text-center mb-4">
                <a href="/" class="text-decoration-none">
                    <i class="bi bi-rocket-takeoff-fill fs-1 text-primary" style="color: #6c63ff !important;"></i>
                    <h2 class="fw-bold mt-2 text-dark">OctavoApp</h2>
                </a>
            </div>
            <div class="card">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold text-center mb-4">Hola de nuevo</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control form-control-lg bg-light" value="{{ old('email') }}" placeholder="tu@email.com" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-muted small fw-bold d-flex justify-content-between">
                                Contraseña
                                <a href="#" class="text-decoration-none small" style="color: #6c63ff;">¿Olvidaste tu contraseña?</a>
                            </label>
                            <input type="password" name="password" class="form-control form-control-lg bg-light" placeholder="••••••••" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold">Ingresar</button>
                        </div>
                    </form>

                    <div class="text-center mt-4 pt-2 border-top">
                        <p class="text-muted mb-0">¿No tienes cuenta? <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #6c63ff;">Regístrate aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>