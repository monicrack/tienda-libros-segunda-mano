<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tienda de Libros de Segunda Mano')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid d-flex align-items-center ">
            <!-- Logo + Buscador -->
            <div class="d-flex align-items-center flex-grow-1">
                <div class="logo me-3">
                    <img src="{{ asset('images/ui/logo_dorado_moderno.webp') }}"
                        alt="Logo"
                        style="width:100px; height:100px; border-radius:50%;">
                </div>

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
                <a href="/login"
                    class="btn btn-outline-light btn-lg"
                    style="color:#D4AF37; border:2px solid #D4AF37;">
                    <i class="bi bi-person-fill"></i> Login
                </a>

                <a href="#"
                    class="btn btn-outline-light btn-lg"
                    style="color:#D4AF37; border:2px solid #D4AF37;">
                    <i class="bi bi-person-circle"></i> Registro
                </a>

                <a href="/carrito"
                    class="btn btn-outline-light btn-lg"
                    style="color:#D4AF37; border:2px solid #D4AF37;">
                    <i class="bi bi-cart-fill"></i> Mi Carrito
                </a>
            </div>
        </div>
        <!-- Submenú -->
        <div class="submenu w-100 mt-3" style="background-color:#50C878;">
            <div class="container-fluid d-flex flex-wrap justify-content-center gap-3 py-2">
                <a href="{{ route('books.novedades') }}" class="text-white fw-bold">Novedades</a>
                <a href="{{ route('books.index') }}" class="text-white fw-bold">Libros</a>
                <a href="{{ route('books.sell') }}" class="text-white fw-bold">Compramos tus libros</a>
                <a href="{{ route('contact') }}" class="text-white fw-bold">Contacto</a>
            </div>
        </div>
    </nav>
        <div class="main">
        @yield('content')
    </div>
    <!-- Footer -->
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
                        <li><a href="#" class="text-light">Formulario de contacto</a></li>
                    </ul>
                </div>

                <!-- Páginas legales -->
                <div class="col-md-3 mb-3">
                    <h5 style="color:#50C878;">Páginas legales</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Aviso legal</a></li>
                        <li><a href="#" class="text-light">Política de Cookies</a></li>
                        <li><a href="#" class="text-light">Condiciones de venta</a></li>
                        <li><a href="#" class="text-light">Protección de datos</a></li>
                    </ul>
                </div>

                <!-- Información -->
                <div class="col-md-3 mb-3">
                    <h5 style="color:#50C878;">Información</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Atención al cliente</a></li>
                        <li><a href="#" class="text-light">Quiénes somos</a></li>
                        <li><a href="#" class="text-light">Gastos de envío</a></li>
                        <li><a href="#" class="text-light">Noticias</a></li>
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