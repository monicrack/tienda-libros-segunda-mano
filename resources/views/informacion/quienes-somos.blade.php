{{-- Vista para la página de información de la empresa en la aplicación principal --}}

@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-center mb-4" style="color:#D4AF37;" id="libros">Quiénes Somos</h1>
    <p class="text-dark">
        <strong>ReLibroManía</strong> nace de la pasión por los libros y el deseo de acercar la lectura a todas las personas.
        Somos un proyecto independiente que apuesta por la cultura, la sostenibilidad y la accesibilidad,
        ofreciendo una selección cuidada de libros nuevos y de segunda mano.
    </p>

    <h2>Nuestra misión</h2>
    <p class="text-dark">
        Queremos que cada lector encuentre su próxima historia favorita.  
        Trabajamos para ofrecer precios justos, envíos rápidos y una experiencia de compra sencilla y agradable.
    </p>

    <h2>Nuestros valores</h2>
    <ul class="text-dark">
        <li><strong>Pasión por la lectura:</strong> creemos en el poder transformador de los libros.</li>
        <li><strong>Transparencia:</strong> ofrecemos información clara y honesta en cada producto.</li>
        <li><strong>Sostenibilidad:</strong> fomentamos la reutilización de libros y el consumo responsable.</li>
        <li><strong>Atención cercana:</strong> acompañamos al lector en cada paso del proceso.</li>
    </ul>

    <h2>Nuestro equipo</h2>
    <p class="text-dark">
        Detrás de ReLibroManía hay un equipo pequeño pero comprometido, que revisa cada libro,
        prepara cada pedido con cuidado y trabaja para mejorar la plataforma día a día.
    </p>

    <h2>Por qué elegirnos</h2>
    <ul class="text-dark">
        <li>Catálogo variado y en constante crecimiento</li>
        <li>Libros revisados y clasificados con detalle</li>
        <li>Atención al cliente cercana y rápida</li>
        <li>Envíos seguros y bien protegidos</li>
    </ul>

</div>
@endsection