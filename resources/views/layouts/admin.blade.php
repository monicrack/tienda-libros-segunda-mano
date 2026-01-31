{{-- Layout principal del panel de administración. Define la estructura base para todas las vistas 
del área administrativa: navbar, buscador, enlaces de gestión, contenido dinámico y footer. --}}

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="admin-layout bg-black">

    {{-- NAVBAR ADMIN --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top " style="border-bottom:6px solid #50C878;">
        <div class="container-fluid d-flex align-items-center mt-2">
            <!-- Logo -->
            <div class="d-flex align-items-center w-100 w-lg-75">
                <div class="logo me-3">
                    <img src="{{ asset('images/ui/logo_dorado_moderno.webp') }}"
                        alt="Logo"
                        style="width:100px; height:100px; border-radius:50%;">
                </div>
                <!--  Buscador -->
                <form class="buscador d-flex flex-grow-1 me-2"
                    action="{{ route('admin.libros.search') }}"
                    method="GET">
                    <input class="form-control me-2"
                        type="search"
                        name="q"
                        placeholder="Buscar libros..."
                        aria-label="Buscar"
                        style="color:#D4AF37; border:2px solid #D4AF37;">
                    <button class="btn btn-outline-light"
                        style="color:#D4AF37; border:2px solid #D4AF37;"
                        type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            @auth
            <!-- Botones -->
            <div class="d-flex gap-3 ms-auto w-100 ">
                <span class="text-light align-self-center fw-bold ">
                    Hola, {{ Auth::user()->name }}
                </span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light btn-lg nav-btn "
                        style="color:#D4AF37; border:2px solid #D4AF37;">
                        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                    </button>
                </form>
                <button class="btn btn-outline-light btn-lg nav-btn"
                    style="color:#D4AF37; border:2px solid #D4AF37;">

                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Panel</a>
                </button>

                <button class="btn btn-outline-light btn-lg nav-btn "
                    style="color:#D4AF37; border:2px solid #D4AF37;">
                    <a class="nav-link" href="{{ route('admin.libros.index') }}" style="color:#D4AF37;">
                        Gestionar libros
                    </a>
                </button>

                <button class="btn btn-outline-light btn-lg nav-btn "
                    style="color:#D4AF37; border:2px solid #D4AF37;">
                    <a class="nav-link" href="{{ route('admin.inventario') }}" style="color:#D4AF37;">
                        Inventario
                    </a>
                </button>
            </div>

            @endauth
        </div>
    </nav>

    {{-- CONTENIDO --}}
    <main class="py-5 mt-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light pt-4 pb-2 border-top-dorado">
        <div class="container">
            <div class="row align-items-center">

                <!-- Logo -->
                <div class="col-md-3 text-center text-md-start mb-3 mb-md-0">
                    <img src="{{ asset('images/ui/logo_dorado_moderno.webp') }}"
                        alt="Logo"
                        style="width:70px; height:70px; border-radius:50%;">
                    <h6 style="color:#50C878; margin-top:8px;">ReLibroManía</h6>
                </div>

                <!-- Copyright -->
                <div class="col-md-9 text-center text-md-end" style="color:#D4AF37;">
                    <small>2026 © ReLibroManía — Todos los Derechos Reservados</small>
                </div>

            </div>
        </div>
    </footer>

    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>