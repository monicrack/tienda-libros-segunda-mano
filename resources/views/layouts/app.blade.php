{{-- CAPA VISUAL --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tienda de Libros de Segunda Mano')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<!-- Banner para aceptar cookies-->
@if(!Cookie::get('cookies_aceptadas_relibromania'))
<div id="cookie-banner" style="
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #000;
    color: #fff;
    padding: 15px;
    text-align: center;
    border-top: 3px solid #D4AF37;
    z-index: 9999;
">
    <span>
        Usamos cookies para mejorar tu experiencia.
        <a href="{{ route('legal.cookies') }}" style="color:#D4AF37; text-decoration: underline;">
            Política de Cookies
        </a>
    </span>

    <form action="{{ route('cookies.aceptar') }}" method="POST" style="display:inline;">
        @csrf
        <button class="btn btn-sm" style="background:#50C878; color:#000; margin-left:10px;">
            Aceptar
        </button>
    </form>
</div>
@endif

<body>

    {{-- MENÚ PRINCIPAL --}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

        @if(session('success'))
        <div class="alert text-light text-center mb-0">
            {{ session('success') }}
        </div>
        @endif
        <div class="container-fluid d-flex align-items-center ">
            <!-- Logo -->
            <div class="d-flex align-items-center flex-grow-1">
                <div class="logo me-3">
                    <img src="{{ asset('images/ui/logo_dorado_moderno.webp') }}"
                        alt="Logo"
                        style="width:100px; height:100px; border-radius:50%;">
                </div>
                <!--  Buscador -->
                <form class="d-flex flex-grow-1 me-4"
                    action="{{ route('books.search') }}"
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

            <!-- Botones -->
            <div class="d-flex gap-3 ms-auto">

                {{-- Si NO está logueado --}}
                @guest
                <a href="{{ route('login') }}"
                    class="btn btn-outline-light btn-lg nav-btn"
                    style="color:#D4AF37; border:2px solid #D4AF37;">
                    <i class="bi bi-person-fill"></i> Login
                </a>

                <a href="{{ route('register') }}"
                    class="btn btn-outline-light btn-lg nav-btn"
                    style="color:#D4AF37; border:2px solid #D4AF37;">
                    <i class="bi bi-person-circle"></i> Registro
                </a>
                @endguest


                {{-- Si SÍ está logueado --}}
                @auth
                <span class="text-light align-self-center fw-bold">
                    Hola, {{ Auth::user()->name }}
                </span>

                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light btn-lg nav-btn"
                        style="color:#D4AF37; border:2px solid #D4AF37;">
                        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                    </button>
                </form>

                <button class="btn btn-outline-light btn-lg nav-btn"
                    style="color:#D4AF37; border:2px solid #D4AF37;">

                    <a class="nav-link" href="{{ route('ventas.form') }}">Vender a la tienda</a>
                </button>

                <button class="btn btn-outline-light btn-lg nav-btn"
                    style="color:#D4AF37; border:2px solid #D4AF37;">
                    <a class="nav-link" href="{{ route('compras.cliente') }}" style="color:#D4AF37;">
                        Mis compras
                    </a>
                </button>

                <button class="btn btn-outline-light btn-lg nav-btn"
                    style="color:#D4AF37; border:2px solid #D4AF37;">
                    <a class="nav-link" href="{{ route('compras.vendedor') }}" style="color:#D4AF37;">
                        Mis ventas
                    </a>
                </button>
                @endauth


                {{-- Carrito --}}
                @php
                $totalCarrito = collect(session('carrito', []))->sum('cantidad');
                @endphp

                <a href="{{ route('carrito.index') }}"
                    class="btn btn-outline-light btn-lg nav-btn position-relative"
                    style="color:#D4AF37; border:2px solid #D4AF37;">
                    <i class="bi bi-cart-fill"></i> Mi Carrito

                    @if($totalCarrito > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $totalCarrito }}
                    </span>
                    @endif
                </a>


            </div>

        </div>

        {{-- SUBMENÚ --}}

        <div class="submenu w-100 mt-3" style="background-color:#50C878;">
            <div class="container-fluid d-flex flex-wrap justify-content-center gap-3 py-2 menu-principal">
                <a href="{{ url('/') }}" class="text-white fw-bold">Inicio</a>
                <a href="{{ route('books.novedades') }}" class="text-white fw-bold">Novedades</a>
                <div class="dropdown">
                    <a class="text-white fw-bold dropdown-toggle" href="#" id="librosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Libros
                    </a>
                    <!-- Submnenú Libros -->
                    <ul class="dropdown-menu" style="background-color:#50C878;" aria-labelledby="librosDropdown">
                        <li><a class="dropdown-item fw-bold" href="{{ route('libros.todos') }}">Todos los libros</a></li>
                        <li><a class="dropdown-item fw-bold" href="{{ route('libros.terror') }}">Terror</a></li>
                        <li><a class="dropdown-item fw-bold" href="{{ route('libros.novela') }}">Novela</a></li>
                        <li><a class="dropdown-item fw-bold" href="{{ route('libros.infantil') }}">Infantil</a></li>
                        <li><a class="dropdown-item fw-bold" href="{{ route('libros.cienciaficcion') }}">Ficción</a></li>
                        <li><a class="dropdown-item fw-bold" href="{{ route('libros.fantasia') }}">Fantasía</a></li>
                    </ul>
                </div>

                <a href="{{ route('sell') }}" class="text-white fw-bold">Compramos tus libros</a>
                <a href="{{ route('contact') }}" class="text-white fw-bold">Contacto</a>
            </div>
        </div>

    </nav>
    <div class="main">
        @yield('content')
    </div>

    {{-- FOOTER --}}

    <footer class="bg-dark text-light pt-4 pb-2" style="border-top: 3px solid #50C878;">
        <div class="container">
            <div class="row">
                <!-- Logotipo -->
                <div class="logo col-md-3 mb-3 text-center text-md-start">
                    <img src="{{ asset('images/ui/logo_dorado_moderno.webp') }}"
                        alt="Logo"
                        style="width:100px; height:100px; border-radius:50%;">
                    <h5 style="color:#50C878;">ReLibroManía</h5>
                </div>
                <!-- Contacto -->
                <div class="contacto col-md-3 mb-3">
                    <h5 style="color:#50C878;">Contacto</h5>
                    <ul class="list-unstyled">
                        <li>(+34) 00 000 00 00</li>
                        <li><a href="mailto:libros@relibromania.es" class="text-light">libros@relibromania.es</a></li>
                        <li><a href="{{ route('contact') }}" class="text-light">Formulario de contacto</a></li>

                    </ul>
                </div>

                <!-- Páginas legales -->
                <div class="col-md-3 mb-3">
                    <h5 style="color:#50C878;">Páginas legales</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('legal.aviso') }}" class="text-light">Aviso legal</a></li>
                        <li><a href="{{ route('legal.cookies') }}" class="text-light">Política de Cookies</a></li>
                        <li><a href="{{ route('legal.condiciones') }}" class="text-light">Condiciones de Venta</a></li>
                        <li><a href="{{ route('legal.proteccion') }}" class="text-light">Protección de Datos</a></li>

                    </ul>
                </div>

                <!-- Información -->
                <div class="col-md-3 mb-3">
                    <h5 style="color:#50C878;">Información</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('info.atencion') }}" class="text-light">Atención al Cliente</a></li>
                        <li><a href="{{ route('info.quienes') }}" class="text-light">Quiénes Somos</a></li>
                        <li><a href="{{ route('info.gastos') }}" class="text-light">Gastos de Envío</a></li>
                        <li><a href="{{ route('info.envios') }}" class="text-light">Envíos y Devoluciones</a></li>
                    </ul>
                </div>

            </div>

            <!-- Línea inferior -->
            <div class="row border-top-dorado">
                <div class="col-12 text-center mt-3" style="color: #D4AF37;;">
                    <small>2026 © ReLibroManía Todos los Derechos Reservados</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>