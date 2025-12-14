@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<!-- Contenido principal -->
<div class="bg-dark text-light d-flex flex-column justify-content-center align-items-center min-vh-100 contenido-principal">
    <div class="titulo-contenedor">
        <h1 style="color: #D4AF37">Bienvenido a tu tienda de libros de segunda mano</h1>
    </div>
    <h3 style="color: #50C878;">Compra y vende libros usados de forma sencilla</h3>
    <!-- Imágenes -->
    <div class="row imagenes justify-content-center">
        <div class="col-auto">
            <img src="{{ asset('images/ui/portada1.webp') }}" alt="Portada de libros" class="img-fluid portada-img">
        </div>
        <div class="col-auto">
            <img src="{{ asset('images/ui/portada.webp') }}" alt="Portada de libros" class="img-fluid portada-img">
        </div>
        <div class="col-auto">
            <img src="{{ asset('images/ui/portada3.webp') }}" alt="Portada de libros" class="img-fluid portada-img">
        </div>
        <div class="col-auto">
            <img src="{{ asset('images/ui/portada4.webp') }}" alt="Portada de libros" class="img-fluid portada-img">
        </div>
    </div>
</div>

<!-- Carrusel de Novedades -->
<div class="container-fluid  bg-dark text-light py-4 mt-negativo" id="novedades">
    <h2 class="text-center mb-4" style="color:#D4AF37;">Novedades</h2>

    <div id="novedadesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Primer slide -->
            <div class="carousel-item active">
                <div class="row justify-content-center px-3">
                    <div class="col-6 col-lg-3 mb-3">
                        <div class="card h-100 bg-white text-dark text-center">
                            <img src="{{ asset('images/libros/libro1.jpg') }}" class="card-img-top" alt="Libro 1">
                            <div class="card-body">
                                <h5 class="card-title">Título del Libro 1</h5>
                                <!-- Botón para desplegar -->
                                <p>
                                    <a class="btn btn-sm btn-resumen" data-bs-toggle="collapse" href="#resumen1" role="button" aria-expanded="false" aria-controls="resumen1">
                                        Ver resumen
                                    </a>
                                </p>
                                <!-- Contenido desplegable -->
                                <div class="collapse" id="resumen1">
                                    <div class="card card-body">
                                        Este es un resumen más largo del libro 1. Toda la sipnosis aquí.
                                    </div>
                                </div>
                                <p class="fw-bold text-success">9,99 €</p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-3">
                        <div class="card h-100 bg-white text-dark text-center">
                            <img src="{{ asset('images/libros/libro2.jpg') }}" class="card-img-top" alt="Libro 2">
                            <div class="card-body">
                                <h5 class="card-title">Título del Libro 2</h5>
                                    <!-- Botón para desplegar -->
                                <p>
                                    <a class="btn btn-sm btn-resumen" data-bs-toggle="collapse" href="#resumen2" role="button" aria-expanded="false" aria-controls="resumen1">
                                        Ver resumen
                                    </a>
                                </p>
                                <!-- Contenido desplegable -->
                                <div class="collapse" id="resumen2">
                                    <div class="card card-body">
                                        Este es un resumen más largo del libro 2. Toda la sipnosis aquí.
                                    </div>
                                </div>
                                <p class="fw-bold text-success">12,50 €</p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-3">
                        <div class="card h-100 bg-white text-dark text-center">
                            <img src="{{ asset('images/libros/libro3.jpg') }}" class="card-img-top" alt="Libro 3">
                            <div class="card-body">
                                <h5 class="card-title">Título del Libro 3</h5>
                                    <!-- Botón para desplegar -->
                                <p>
                                    <a class="btn btn-sm btn-resumen" data-bs-toggle="collapse" href="#resumen3" role="button" aria-expanded="false" aria-controls="resumen1">
                                        Ver resumen
                                    </a>
                                </p>
                                <!-- Contenido desplegable -->
                                <div class="collapse" id="resumen3">
                                    <div class="card card-body">
                                        Este es un resumen más largo del libro 3. Toda la sipnosis aquí.
                                    </div>
                                </div>
                                <p class="fw-bold text-success">7,80 €</p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-3">
                        <div class="card h-100 bg-white text-dark text-center">
                            <img src="{{ asset('images/libros/libro4.jpg') }}" class="card-img-top" alt="Libro 4">
                            <div class="card-body">
                                <h5 class="card-title">Título del Libro 4</h5>
                                    <!-- Botón para desplegar -->
                                <p>
                                    <a class="btn btn-sm btn-resumen" data-bs-toggle="collapse" href="#resumen4" role="button" aria-expanded="false" aria-controls="resumen1">
                                        Ver resumen
                                    </a>
                                </p>
                                <!-- Contenido desplegable -->
                                <div class="collapse" id="resumen4">
                                    <div class="card card-body">
                                        Este es un resumen más largo del libro 4. Toda la sipnosis aquí.
                                    </div>
                                </div>
                                <p class="fw-bold text-success">15,00 €</p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection