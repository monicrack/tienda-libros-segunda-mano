<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tienda de Libros de Segunda Mano')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div>
                <!-- logo-->
                <img src="{{ asset('images/ui/logo_dorado_moderno.webp') }}" alt="Logo" style="width:100px; height:100px; border-radius:50%;">
            </div>
            <!-- Buscador -->
            <form class="d-flex mx-auto" action="{{ route('books.search') }}" method="GET" style="width: 50%;">
                <input class="form-control me-2" type="search" name="q" placeholder="Buscar libros..." aria-label="Buscar" style="color:#D4AF37; border:2px solid #D4AF37;">
                <button class="btn btn-outline-light" style="color:#D4AF37; border:2px solid #D4AF37;" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            <div>
                 <!-- Botones -->
                <a href="/login" class="btn btn-outline-light btn-lg" style="color:#D4AF37; border:2px solid #D4AF37;"><i class="bi bi-person-fill"></i> Login</a>
                <a href="#" class="btn btn-outline-light btn-lg" style="color:#D4AF37; border:2px solid #D4AF37;"><i class="bi bi-person-circle"></i> Registro</a>
                <a href="/carrito" class="btn btn-outline-light btn-lg" style="color:#D4AF37; border:2px solid #D4AF37;"><i class="bi bi-cart-fill"></i> Mi Carrito</a>

            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>


</body>

</html>