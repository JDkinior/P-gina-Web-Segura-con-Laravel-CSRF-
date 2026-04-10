<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>Bienvenido | OctavoApp</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        .text-primary-custom { color: #6c63ff !important; }
        .bg-primary-custom { background-color: #6c63ff !important; }
        
        .btn-primary-custom { 
            background-color: #6c63ff; 
            border-color: #6c63ff; 
            color: white; 
        }
        .btn-primary-custom:hover { 
            background-color: #5750d4; 
            border-color: #5750d4; 
            color: white; 
        }

        @keyframes animatedBg {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .hero-section {
            background: linear-gradient(-45deg, #f4f6f9, #e2e1ff, #f8f9fa, #dce4ff);
            background-size: 400% 400%;
            animation: animatedBg 12s ease infinite;
            padding: 100px 0 60px 0;
            position: relative;
        }
        
        .floating-shape {
            position: absolute;
            background: linear-gradient(135deg, rgba(108, 99, 255, 0.1) 0%, rgba(108, 99, 255, 0) 100%);
            border-radius: 50%;
            z-index: 0;
            pointer-events: none;
        }

        .hero-image-container {
            transform: translateY(40px);
            transition: transform 0.3s ease;
            position: relative;
            z-index: 1;
        }
        .hero-image-container:hover {
            transform: translateY(30px);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            font-size: 32px;
            background-color: rgba(108, 99, 255, 0.1);
            color: #6c63ff;
            margin-bottom: 25px;
        }

        .features-section { padding: 80px 0; }
        .card-feature {
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .card-feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        }

        .cta-section {
            background: linear-gradient(135deg, #6c63ff 0%, #3f3d56 100%);
            color: white;
            padding: 80px 0;
            border-radius: 30px;
        }
        
        .footer { 
            background-color: #1e2125; 
            color: #adb5bd; 
            padding: 40px 0 20px; 
        }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-3">
      <div class="container">
        <a class="navbar-brand fw-bold text-primary-custom fs-4" href="#">
            <i class="bi bi-rocket-takeoff-fill me-2"></i>OctavoApp
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav gap-3 align-items-center mt-3 mt-lg-0">
            @auth
            <li class="nav-item">
              <a class="btn btn-primary-custom shadow-sm px-4 py-2 rounded-pill fw-bold text-nowrap d-flex align-items-center justify-content-center" style="height: 44px;" href="{{ route('dashboard') }}">Ir a mi Dashboard</a>
            </li>
            @else
            <li class="nav-item">
              <a class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-bold text-nowrap d-flex align-items-center justify-content-center" style="height: 44px;" href="login">Iniciar Sesión</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary-custom shadow-sm px-4 py-2 rounded-pill fw-bold text-nowrap d-flex align-items-center justify-content-center" style="height: 44px;" href="register">Registrarse Gratis</a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section text-center overflow-hidden">
        <!-- Floating Animated Shapes -->
        <div class="floating-shape" style="width: 400px; height: 400px; top: -100px; left: -100px; animation: float 6s ease-in-out infinite;"></div>
        <div class="floating-shape" style="width: 300px; height: 300px; bottom: 100px; right: -50px; animation: float 8s ease-in-out infinite reverse;"></div>
        <div class="floating-shape" style="width: 150px; height: 150px; top: 20%; left: 20%; animation: float 7s ease-in-out infinite 1s;"></div>
        <div class="floating-shape" style="width: 250px; height: 250px; top: 10%; right: 15%; animation: float 9s ease-in-out infinite 2s reverse;"></div>
        <div class="floating-shape" style="width: 120px; height: 120px; bottom: 25%; left: 35%; animation: float 5s ease-in-out infinite 0.5s;"></div>
        <div class="floating-shape" style="width: 350px; height: 350px; bottom: -80px; left: 50%; opacity: 0.5; animation: float 10s ease-in-out infinite 1.5s;"></div>
        <div class="floating-shape" style="width: 200px; height: 200px; top: 40%; right: 30%; opacity: 0.6; animation: float 8s ease-in-out infinite 3s;"></div>

        <style>
            @keyframes float {
                0% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(30px) rotate(10deg); }
                100% { transform: translateY(0px) rotate(0deg); }
            }
        </style>

        <div class="container relative" style="z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-3 fw-bold mb-4 text-dark" style="letter-spacing: -1.5px;">
                        Gestiona tus tareas <br>
                        <span class="text-primary-custom position-relative">fácil, rápido y seguro</span>
                    </h1>
                    <p class="lead mb-5 text-secondary mx-auto" style="max-width: 650px; font-size: 1.25rem;">
                        OctavoApp es la plataforma definitiva diseñada para organizar tus proyectos, mejorar tu productividad y alcanzar tus metas sin estrés ni distracciones.
                    </p>
                    
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mb-5 pb-4">
                        @guest
                        <a href="register" class="btn btn-primary-custom btn-lg px-5 py-3 rounded-pill shadow-lg fw-bold">
                            Empezar Gratis Ahora
                        </a>
                        <a href="#caracteristicas" class="btn btn-white btn-lg px-5 py-3 rounded-pill border shadow-sm text-dark fw-bold bg-white">
                            Descubre cómo funciona
                        </a>
                        @else
                        <a href="{{ route('dashboard') }}" class="btn btn-primary-custom btn-lg px-5 py-3 rounded-pill shadow-lg fw-bold">
                            Continuar trabajando <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                        @endguest
                    </div>
                </div>
            </div>

            <!-- Hero Image Preview (Auto-scrolling Carousel) -->
            <div class="hero-image-container mx-auto shadow-lg rounded-4 overflow-hidden border border-4 border-white" style="max-width: 900px; background: white;">
                <div id="heroAutoCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('asset/images/img1.jpg') }}" class="d-block w-100" alt="Vista previa del Dashboard 1" style="object-fit: cover; height: 480px; object-position: top;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('asset/images/img2.jpg') }}" class="d-block w-100" alt="Vista previa del Dashboard 2" style="object-fit: cover; height: 480px; object-position: top;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('asset/images/img3.jpg') }}" class="d-block w-100" alt="Vista previa del Dashboard 3" style="object-fit: cover; height: 480px; object-position: top;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Features Section -->
    <section id="caracteristicas" class="features-section bg-white">
        <div class="container">
            <div class="text-center mb-5 pb-3">
                <h2 class="display-6 fw-bold text-dark">Todo lo que necesitas para triunfar</h2>
                <p class="lead text-muted">Herramientas simples pero poderosas para dominar tu día a día.</p>
            </div>
            
            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="card card-feature h-100 border-0 shadow-sm p-4 rounded-4 bg-light">
                        <div class="card-body p-0">
                            <div class="feature-icon"><i class="bi bi-kanban"></i></div>
                            <h4 class="fw-bold mb-3">Tableros Flexibles</h4>
                        <p class="text-muted mb-0">Crea tareas, asígnales prioridad y muévelas fácilmente a medida que avanzas. Ten una vista clara de tu flujo de trabajo.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card card-feature h-100 border-0 shadow-sm p-4 rounded-4 bg-light">
                        <div class="card-body p-0">
                            <div class="feature-icon bg-success bg-opacity-10 text-success"><i class="bi bi-check-all"></i></div>
                            <h4 class="fw-bold mb-3">Productividad Total</h4>
                            <p class="text-muted mb-0">Marca tus logros, limpia tu bandeja de pendientes y siente la satisfacción de un día productivo sin olvidarte de nada.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card card-feature h-100 border-0 shadow-sm p-4 rounded-4 bg-light">
                        <div class="card-body p-0">
                            <div class="feature-icon bg-warning bg-opacity-10 text-warning"><i class="bi bi-lightning-charge-fill"></i></div>
                            <h4 class="fw-bold mb-3">Rápido y Seguro</h4>
                            <p class="text-muted mb-0">Tu información y la de tu equipo procesada de forma instantánea bajo estrictos sistemas de seguridad moderna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="container py-5 my-4">
        <div class="cta-section text-center p-5 shadow-lg position-relative overflow-hidden">
            <!-- Decorative circles -->
            <div class="position-absolute top-0 start-0 translate-middle rounded-circle bg-white" style="width: 200px; height: 200px; opacity: 0.05;"></div>
            <div class="position-absolute bottom-0 end-0 translate-middle rounded-circle bg-white" style="width: 400px; height: 400px; opacity: 0.05;"></div>
            
            <div class="position-relative z-1">
                <h2 class="display-5 fw-bold mb-4">¿Listo para retomar el control de tu tiempo?</h2>
                <p class="lead mb-5 opacity-75 mx-auto" style="max-width: 600px;">Únete a cientos de emprendedores, estudiantes y profesionales que ya están transformando sus ideas en tareas cumplidas.</p>
                
                @guest
                <a href="register" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold text-dark shadow-lg">
                    Crear cuenta gratis ahora <i class="bi bi-arrow-right ms-2"></i>
                </a>
                @endguest
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container text-center">
            <a href="#" class="text-decoration-none text-white fs-5 fw-bold mb-3 d-inline-block">
                <i class="bi bi-rocket-takeoff-fill text-primary-custom me-2"></i>OctavoApp
            </a>
            <p class="small text-light text-opacity-75 mb-0">&copy; {{ date('Y') }} Todos los derechos reservados. Desarrollado para tu productividad.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>