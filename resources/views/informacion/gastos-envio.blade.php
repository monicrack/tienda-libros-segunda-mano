{{-- Vista para la página de información de gastos de envíos en la aplicación principal --}}

@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-center mb-4" style="color:#D4AF37;" id="libros">Gastos de Envíos</h1>
    <p class="text-dark">
        En <strong>ReLibroManía</strong> queremos ofrecerte un servicio de envío transparente y accesible.
        Aquí encontrarás toda la información sobre los costes asociados al envío de tus pedidos.
    </p>

    <h2>Tarifas de envío</h2>
    <p class=" text-dark">
        Los gastos de envío se calculan automáticamente durante el proceso de compra según el destino y
        el peso del pedido. A continuación, te mostramos las tarifas orientativas:
    </p>

    <ul class="text-dark">
        <li><strong>España peninsular:</strong> 3,99 €</li>
        <li><strong>Baleares:</strong> 5,99 €</li>
        <li><strong>Canarias, Ceuta y Melilla:</strong> 7,99 €</li>
        <li><strong>Pedidos superiores a 50 €:</strong> Envío gratuito</li>
    </ul>

    <h2>Cómo se calculan los gastos</h2>
    <p class="text-dark">
        El coste final depende de:
    </p>
    <ul class="text-dark">
        <li>El peso total del pedido</li>
        <li>La dirección de entrega</li>
        <li>El tipo de envío seleccionado</li>
    </ul>

    <h2>Promociones y descuentos</h2>
    <p class="text-dark">
        Periódicamente ofrecemos promociones de envío gratuito o descuentos especiales.
        Te recomendamos suscribirte a nuestro boletín para no perderte ninguna oferta.
    </p>

    <h2>Plazos de entrega</h2>
    <p class="text-dark">
        Los plazos de entrega varían según la zona:
    </p>
    <ul class="text-dark">
        <li>España peninsular: 2 - 5 días laborables</li>
        <li>Baleares: 3 - 7 días laborables</li>
        <li>Canarias, Ceuta y Melilla: 5 - 10 días laborables</li>
    </ul>

</div>
@endsection