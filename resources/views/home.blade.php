{{-- Esta es la página principal de ReLibroManía.
    Contiene:
    - Portada visual con mensaje de bienvenida
    - Carrusel de novedades
    - Secciones explicativas sobre la tienda
    - Banner final --}}

@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

{{-- CONTENIDO PRINCIPAL  --}}

<div class="bg-dark text-light d-flex flex-column justify-content-center align-items-center min-vh-100 contenido-principal">

    {{-- Título principal --}}
    <div class="titulo-contenedor">
        <h1 style="color: #D4AF37">Bienvenido a tu tienda de Libros de Segunda Mano</h1>
    </div>

    {{-- Subtítulo --}}
    <h3 style="color: #50C878;">Compra y Vende Libros usados de forma sencilla</h3>

    {{-- Galería de imágenes de portada --}}
    <div class="row imagenes justify-content-center">
        <div class="col-auto">
            <img src="{{ asset('images/ui/portada3.webp') }}" alt="Portada de libros" class="img-fluid portada-img">
        </div>
        <div class="col-auto">
            <img src="{{ asset('images/ui/portada.webp') }}" alt="Portada de libros" class="img-fluid portada-img">
        </div>
        <div class="col-auto">
            <img src="{{ asset('images/ui/portada1.webp') }}" alt="Portada de libros" class="img-fluid portada-img">
        </div>
        <div class="col-auto">
            <img src="{{ asset('images/ui/portada4.webp') }}" alt="Portada de libros" class="img-fluid portada-img">
        </div>
    </div>
</div>


{{-- CARRUSEL DE NOVEDADES --}}

    <div class="container-fluid bg-dark text-light py-4 mt-negativo" id="novedades">

        {{-- Título con enlace a Novedades --}}
        <h2 class="text-center mb-4">
            <a href="{{ route('books.novedades') }}" style="color:#D4AF37; text-decoration:none;">
                Novedades
            </a>
        </h2>

        <div class="row justify-content-center px-3">

            {{-- ===== TARJETA 1 ===== --}}
            <div class="col-6 col-lg-3 mb-3">
                <div class="card h-100 bg-white text-dark text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <img src="{{ asset('images/books/la-chica-del-lago.webp') }}"
                            alt="La chica del lago"
                            class="img-fluid mb-3"
                            style="max-width:200px;">
                        <h5 class="card-title fw-bold">La chica del lago</h5>
                        <a href="{{ route('books.show', 201) }}" class="btn btn-primary mt-auto">Ver libro</a>
                    </div>
                </div>
            </div>

            {{-- ===== TARJETA 2 ===== --}}
            <div class="col-6 col-lg-3 mb-3">
                <div class="card h-100 bg-white text-dark text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <img src="{{ asset('images/books/ac-gran-zark.jpg') }}"
                            alt="Alex Colt"
                            class="img-fluid mb-3"
                            style="max-width:200px;">
                        <h5 class="card-title fw-bold">Alex Colt. El gran Zark</h5>
                        <a href="{{ route('books.show', 242) }}" class="btn btn-primary mt-auto">Ver libro</a>
                    </div>
                </div>
            </div>

            {{-- ===== TARJETA 3 ===== --}}
            <div class="col-6 col-lg-3 mb-3">
                <div class="card h-100 bg-white text-dark text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <img src="{{ asset('images/books/ab-51-enigmas-resolver.jpg') }}"
                            alt="Amanda Black"
                            class="img-fluid mb-3"
                            style="max-width:200px;">
                        <h5 class="card-title fw-bold">Amanda Black - 51 enigmas por resolver</h5>
                        <a href="{{ route('books.show', 226) }}" class="btn btn-primary mt-auto">Ver libro</a>
                    </div>
                </div>
            </div>

            {{-- ===== TARJETA 4 ===== --}}
            <div class="col-6 col-lg-3 mb-3">
                <div class="card h-100 bg-white text-dark text-center">
                    <div class="card-body d-flex flex-column align-items-center">
                        <img src="{{ asset('images/books/todo-muere.jpg') }}"
                            alt="Libro 4"
                            class="img-fluid mb-3"
                            style="max-width:200px;">
                        <h5 class="card-title fw-bold">Todo Muere (Todo arde 3)</h5>
                        <a href="{{ route('books.show', 184) }}" class="btn btn-primary mt-auto">Ver libro</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
{{-- SECCIONES EXPLICATIVAS --}}
<div class="container-fluid bg-dark text-light">
    {{-- Primera sección informativa --}}
    <div class="textos row">
        <h3 style="color: #50C878;">
            <i class="bi bi-book"></i> Descubre Nuestra Amplia Colección de Libros de Segunda Mano a Precios Inigualables
        </h3>
        <p>Bienvenid@ a ReLibroManía! Somos tu tienda online de confianza especializada en libros de segunda mano.</p>
        <p>Comprar libros nunca fue tan fácil.</p>
        <p>Navega por nuestro extenso catálogo y encuentra una variedad inigualable de títulos.</p>
        <p>Además de ofrecer precios asequibles, nos esforzamos por promover la sostenibilidad y el amor por la lectura.</p>
        <p>Ya sea que busques literatura clásica, novelas contemporáneas o ejemplares raros, tenemos algo
            para cada amante de la lectura.</p>
        <p>Explora nuestras categorías, aprovecha nuestras ofertas exclusivas y sumérgete en el apasionante mundo
            de los libros de segunda mano.</p>
    </div>

    {{-- Segunda sección informativa --}}
    <div class="textos row">
        <h3 style="color: #50C878;">
            <i class="bi bi-book"></i> Ahorra comprando libros de segunda mano
        </h3>
        <p>Comprar libros de segunda mano es una excelente manera de disfrutar de tus autores favoritos
            y descubrir nuevas lecturas sin gastar una fortuna.</p>
        <p>Todos nuestros libros son cuidadosamente seleccionados
            y están en excelentes condiciones, garantizando una experiencia de lectura placentera.</p>
        <p>Además de ofrecer precios asequibles, nos esforzamos por promover la sostenibilidad y el amor por la lectura.</p>
        <p>Al elegir libros de segunda mano, no solo ahorras dinero, sino que también contribuyes a reducir
            el impacto ambiental y a darle una segunda vida a maravillosas obras literarias.</p>
        <p>Explora nuestras categorías, aprovecha nuestras ofertas exclusivas y sumérgete en el apasionante mundo
            de los libros de segunda mano.</p>
        <h4>¡Feliz lectura!</h4>
    </div>
</div>

{{-- BANNER FINAL --}}
<div class="container-fluid p-0">
    <img src="{{ asset('images/ui/banner.webp') }}" alt="Banner Libros" class="img-fluid w-100">
</div>
@endsection