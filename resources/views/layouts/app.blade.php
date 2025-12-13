<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tienda de Libros')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">LibrosUsados</a>
        <a href="/libros" class="btn btn-outline-light btn-sm">Catálogo</a>
        <div>
            <a href="#" class="btn btn-outline-light btn-sm">Login</a>
            <a href="#" class="btn btn-outline-light btn-sm">Registro</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>


</body>
</html>
