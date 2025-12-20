@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<!-- Contenido principal -->
<div class="bg-dark text-light d-flex flex-column justify-content-center align-items-center min-vh-100 contenido-principal">
    <div class="titulo-contenedor">
        <h1 style="color: #D4AF37">Bienvenido a tu tienda de Libros de Segunda Mano</h1>
    </div>
    <h3 style="color: #50C878;">Compra y Vende Libros usados de forma sencilla</h3>
    <!-- Imágenes -->
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

<!-- Carrusel de Novedades -->
<div class="container-fluid bg-dark text-light py-4 mt-negativo" id="novedades">
    <h2 class="text-center mb-4" style="color:#D4AF37;">Novedades</h2>
    <!-- Tarjetas-->
    <div id="novedadesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row justify-content-center px-3">
                    <div class="col-6 col-lg-3 mb-3">
                        <div class="card h-100 bg-white text-dark text-center">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img src="{{ asset('images/books/la-chica-del-lago.webp') }}"
                                    alt="Libro 1"
                                    class="img-fluid mb-3"
                                    style="max-width:200px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">La chica del lago</h5>
                                <!-- Botón para desplegar -->
                                <p>
                                    <a class="btn btn-sm btn-resumen" data-bs-toggle="collapse" href="#resumen1" role="button" aria-expanded="false" aria-controls="resumen1">
                                        Sinopsis
                                    </a>
                                </p>
                                <!-- Contenido desplegable -->
                                <div class="collapse" id="resumen1">
                                    <div class="card card-body">
                                        Thriller adictivo sobre la escritora de éxito Quintana Torres, quien recibe una foto
                                        del diario de Alba, la adolescente desaparecida en 1999, cuya historia inspiró
                                        su novela más famosa. Esto la lleva a regresar a su pueblo natal, Urkizu,
                                        para investigar el misterio del diario y la desaparición de Alba,
                                        desenterrando secretos del pasado que reabren viejas heridas en una trama trepidante
                                        que mezcla pasado y presente en escenarios como Bilbao, Madrid y el País Vasco.
                                    </div>
                                </div>
                                <p class="fw-bold text-dark">Autor: Mikel Santiago</p>
                                <p class="fw-bold text-success"> 9 €</p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-3">
                        <div class="card h-100 bg-white text-dark text-center">
                             <div class="card-body d-flex flex-column align-items-center">
                                <img src="{{ asset('images/books/ac-gran-zark.jpg') }}"
                                    alt="Libro 2"
                                    class="img-fluid mb-3"
                                    style="max-width:200px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Alex Colt. El gran Zark</h5>
                                <!-- Botón para desplegar -->
                                <p>
                                    <a class="btn btn-sm btn-resumen" data-bs-toggle="collapse" href="#resumen2" role="button" aria-expanded="false" aria-controls="resumen1">
                                     Sipnosis
                                    </a>
                                </p>
                                <!-- Contenido desplegable -->
                                <div class="collapse" id="resumen2">
                                    <div class="card card-body">
                                           Después de que los zarkianos se hayan hecho con la Materia Oscura, 
                                        la fuente principal de energía del universo, la Confederación no tiene más 
                                        remedio que buscar un combustible alternativo... Así que Alex y sus amigos 
                                        saldrán en busca de la Luz Sólida, una fuente de energía legendaria que 
                                        nadie ha visto ni nadie sabe dónde está... ¿Serán ellos los elegidos por 
                                        la profecía para salvar el universo?
                                    </div>
                                </div>
                                <p class="fw-bold text-dark">Autor: Juan Gómez-Jurado</p>
                                <p class="fw-bold text-success">18 €</p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-3">
                        <div class="card h-100 bg-white text-dark text-center">
                             <div class="card-body d-flex flex-column align-items-center">
                                <img src="{{ asset('images/books/ab-ultimo-minuto.jpg') }}"
                                    alt="Libro 3"
                                    class="img-fluid mb-3"
                                    style="max-width:200px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Amanda Black 3 - El Último minuto</h5>
                                <!-- Botón para desplegar -->
                                <p>
                                    <a class="btn btn-sm btn-resumen" data-bs-toggle="collapse" href="#resumen3" role="button" aria-expanded="false" aria-controls="resumen1">
                                        Sinopsis
                                    </a>
                                </p>
                                <!-- Contenido desplegable -->
                                <div class="collapse" id="resumen3">
                                    <div class="card card-body">
                                        Llega el tercer libro de la colección «Amanda Black», la nueva serie para 
                                        niños de Juan Gómez-Jurado y Bárbara Montes. Aventuras repletas de misterio,
                                        acción trepidante y un ritmo frenético. «Su final es tu principio.» Desde que 
                                        heredó sus poderes, Amanda no ha tenido ni un momento de descanso: entrenos, 
                                        deberes, misiones... Pero todo está a punto de cambiar, porque por primera vez 
                                        ha decidido tomarse el día libre para asistir al baile del instituto. Se comprar
                                        á un vestido bonito, le pedirá a Jason que la acompañe y todo será genial. 
                                        ¡El sueño de cualquier adolescente! Sin embargo, las cosas nunca son como una 
                                        quiere. La mañana del baile, la tía Paula le encomienda a Amanda una misión: 
                                        evitar que una importante tablilla sumeria que lleva años desaparecida caiga en 
                                        las manos equivocadas. Y Amanda, como heredera del culto a la diosa Maat, no puede
                                        permitirlo. ¿Será capaz de robar la tablilla antes de que se pierda para siempre? Y,
                                        aunque, lo consiga, ¿llegará a tiempo al baile más importante de su adolescencia? Si 
                                        tienes ganas de vivir una gran aventura, ¡únete a Amanda Black! «LA ADICCIÓN LECTORA 
                                        ESTÁ ASEGURADA.» Adrián Cordellat, El País
                                    </div>
                                </div>
                                <p class="fw-bold text-dark">Autor: Juan Gómez-Jurado</p>
                                <p class="fw-bold text-success">17 €</p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-3">
                        <div class="card h-100 bg-white text-dark text-center">
                             <div class="card-body d-flex flex-column align-items-center">
                                <img src="{{ asset('images/books/todo-muere.jpg') }}"
                                    alt="Libro 4"
                                    class="img-fluid mb-3"
                                    style="max-width:200px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Todo Muere (Todo arde 3)</h5>
                                <!-- Botón para desplegar -->
                                <p>
                                    <a class="btn btn-sm btn-resumen" data-bs-toggle="collapse" href="#resumen4" role="button" aria-expanded="false" aria-controls="resumen1">
                                        Sinopsis
                                    </a>
                                </p>
                                <!-- Contenido desplegable -->
                                <div class="collapse" id="resumen4">
                                    <div class="card card-body">
                                        LA ESPERA HA TERMINADO Se cierra el círculo del Universo Reina Roja. «Ni 
                                        en un millón de años podrías imaginarte un desenlace como este». Zenda 
                                        Vuelve el autor más leído en lengua española. EL MAYOR UNIVERSO DE THRILLER
                                        JAMÁS ESCRITO Nota de la editorial: Esta novela es la clave del Universo 
                                        Reina Roja, el proyecto narrativo al que Juan Gómez-Jurado ha dedicado los 
                                        últimos quince años. Por expreso deseo del autor, en este libro no se incluye 
                                        la clásica sinopsis de la historia.
                                    </div>
                                </div>
                                <p class="fw-bold text-dark">Autor: Juan Gómez-Jurado</p>
                                <p class="fw-bold text-success">21 €</p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sección Explicativa-->
<div class="container-fluid bg-dark text-light">
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
<!-- Imagen banner-->
<div class="container-fluid p-0">
    <img src="{{ asset('images/ui/banner.webp') }}" alt="Banner Libros" class="img-fluid w-100">
</div>
@endsection