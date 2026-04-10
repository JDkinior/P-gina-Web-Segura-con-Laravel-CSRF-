<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Mi App</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #2b3035 0%, #1e2125 100%);
            color: #fff;
        }
        .sidebar-link {
            color: rgba(255, 255, 255, .7);
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            transition: 0.3s;
            margin-bottom: 5px;
        }
        .sidebar-link:hover, .sidebar-link.active {
            color: #fff;
            background: rgba(255, 255, 255, .1);
        }
        .sidebar-link i {
            margin-right: 10px;
        }
        .content-area {
            padding: 20px;
        }
        .stat-card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .icon-box {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3 d-flex flex-column" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-rocket-takeoff-fill fs-3 me-2 text-primary"></i>
                <span class="fs-4 fw-bold">OctavoApp</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="sidebar-link active">
                        <i class="bi bi-speedometer2"></i> Inicio
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-list-task"></i> Mis Tareas
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-person-circle"></i> Perfil
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-gear"></i> Configuración
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=0D8ABC&color=fff" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>{{ auth()->user()->name ?? 'Usuario' }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Configuración</a></li>
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Cerrar Sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content-area w-100 position-relative">
            <!-- Top Header -->
            <header class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded shadow-sm">
                <h4 class="m-0 fw-bold text-secondary">Dashboard General</h4>
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-primary btn-sm rounded-pill px-3 shadow-sm">
                        <i class="bi bi-plus-lg"></i> Nueva Tarea
                    </button>
                    <div class="position-relative ms-3">
                        <i class="bi bi-bell fs-5 text-secondary cursor-pointer"></i>
                        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                    </div>
                </div>
            </header>

            <!-- Welcome Alert -->
            <div class="alert alert-primary alert-dismissible fade show shadow-sm border-0 bg-primary bg-opacity-10 text-primary-emphasis mb-4" role="alert">
                <strong>¡Hola {{ auth()->user()->name ?? '' }}!</strong> Bienvenido de nuevo a tu panel de control. Todo está en orden.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <!-- Stats Row -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card stat-card h-100 p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-kanban"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Total Tareas</h6>
                                <h3 class="mb-0 fw-bold">12</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stat-card h-100 p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-success bg-opacity-10 text-success">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Completadas</h6>
                                <h3 class="mb-0 fw-bold">8</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stat-card h-100 p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-warning bg-opacity-10 text-warning">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Pendientes</h6>
                                <h3 class="mb-0 fw-bold">4</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area (Table example for Tasks) -->
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-0 pt-4 pb-2 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Tareas Recientes</h5>
                    <a href="#" class="text-decoration-none text-primary fw-bold small">Ver todas</a>
                </div>
                <div class="card-body px-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle border-bottom">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th>#</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-secondary">1</td>
                                    <td>Actualizar diseño de inicio</td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill">Completado</span></td>
                                    <td class="text-muted small">09 Abr 2026</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-secondary">2</td>
                                    <td>Implementar Dashboard UI</td>
                                    <td><span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 rounded-pill">En progreso</span></td>
                                    <td class="text-muted small">09 Abr 2026</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-secondary">3</td>
                                    <td>Conectar backend con vista</td>
                                    <td><span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 rounded-pill">Pendiente</span></td>
                                    <td class="text-muted small">10 Abr 2026</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>