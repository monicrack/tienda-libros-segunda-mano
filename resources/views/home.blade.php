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

</div>
@endsection