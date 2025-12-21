@extends('layouts.app')

@section('content')
<div class="container-fluid bg-dark text-light py-4 mt-5" id="categoria-libros">



    <h1 class="text-center mb-4" style="color:#D4AF37;">Compramos tus libros</h1>

    <p class="text-white text-center mb-5">
        ¿Tienes libros que ya no lees? En <strong>ReLibroManía</strong> les damos una segunda vida.
        Cuéntanos qué libros quieres vender y te haremos una oferta rápida y justa.
    </p>

    <!-- Sección explicativa -->
    <div class="row mb-5">
        <div class="col-md-4 text-center">
            <i class="bi bi-book-half" style="font-size:3rem; color:#50C878;"></i>
            <h4 class="mt-3" style="color:#D4AF37;">1. Cuéntanos qué tienes</h4>
            <p>Envíanos los títulos, autores o fotos de los libros que quieres vender.</p>
        </div>

        <div class="col-md-4 text-center">
            <i class="bi bi-cash-coin" style="font-size:3rem; color:#50C878;"></i>
            <h4 class="mt-3" style="color:#D4AF37;">2. Te hacemos una oferta</h4>
            <p>Revisamos su estado y te enviamos una valoración en menos de 24 horas.</p>
        </div>

        <div class="col-md-4 text-center">
            <i class="bi bi-box-seam" style="font-size:3rem; color:#50C878;"></i>
            <h4 class="mt-3" style="color:#D4AF37;">3. Recogida o envío</h4>
            <p>Coordinamos la recogida o te enviamos una etiqueta para que los envíes.</p>
        </div>
    </div>

    <p class="text-white text-center mb-5">
        En <strong>ReLibroManía</strong> damos una segunda vida a los libros.
        Si quieres vender los tuyos, aquí tienes nuestras normas y condiciones.
    </p>

    <!-- Normas -->
    <div class="card shadow-lg p-4">
        <h3 class="mb-4" style="color:#D4AF37;">Normas para la compra de libros</h3>

        <ul class="text-dark" style="font-size:1.1rem; line-height:1.7;">
            <li><strong>Estado general:</strong> Aceptamos libros en buen estado, sin páginas rotas, sin humedad y sin daños estructurales.</li>

            <li><strong>Subrayados y anotaciones:</strong> Se permiten siempre que no dificulten la lectura. No aceptamos libros con más del 30% del contenido subrayado.</li>

            <li><strong>Ediciones aceptadas:</strong> Compramos tanto libros de tapa blanda como tapa dura. No aceptamos fotocopias ni ediciones pirata.</li>

            <li><strong>Libros de texto:</strong> Solo aceptamos ediciones recientes (máximo 3 años) y en buen estado.</li>

            <li><strong>Enciclopedias:</strong> No compramos enciclopedias antiguas ni colecciones incompletas.</li>

            <li><strong>Precio de compra:</strong> La valoración depende del estado, demanda y edición del libro.</li>

            <li><strong>Transporte:</strong> El envío o entrega se coordina una vez aceptada la valoración.</li>

            <li><strong>Rechazo:</strong> Nos reservamos el derecho de rechazar libros que no cumplan las condiciones.</li>
        </ul>
        <p class="mt-4 text-dark">
            Vender tus libros usados en <strong>ReLibroManía</strong> es fácil y sencillo.

        </p>
        <p class="mt-4 text-dark">
            Si deseas que valoremos tus libros, ponte en contacto con nosotros a través de la sección
            <a href="{{ route('contact') }}" style="color:#50C878; font-weight:bold;">Contacto</a>.
        </p>
    </div>


</div>
@endsection