{{-- Vista para la página de información de envíos y devoluciones en la aplicación principal --}}

@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <h1 class="text-center mb-4" style="color:#D4AF37;" id="libros">Envíos y Devoluciones</h1>
    <p class="text-dark">
        En <strong>ReLibroManía</strong> trabajamos para que tus pedidos lleguen en perfectas condiciones y dentro del plazo estimado.
        Aquí encontrarás toda la información relacionada con envíos, entregas y devoluciones.
    </p>

    {{-- ENVÍOS --}}
    <h2 class="mt-4">Envíos</h2>

    <h4 class="mt-3">Plazos de entrega</h4>
    <p class="text-dark">
        Los pedidos se procesan en un plazo de 24 a 48 horas laborables.
        El tiempo de entrega estimado es de:
    </p>
    <ul class="text-dark">
        <li>España peninsular: 2 - 5 días laborables</li>
        <li>Baleares: 3 - 7 días laborables</li>
        <li>Canarias, Ceuta y Melilla: 5 - 10 días laborables</li>
    </ul>

    <h4 class="mt-3">Costes de envío</h4>
    <p class="text-dark">
        Los gastos de envío se calculan automáticamente durante el proceso de compra según el destino y el peso del pedido.
    </p>

    <h4 class="mt-3">Seguimiento del pedido</h4>
    <p class="text-dark">
        Una vez enviado tu pedido, recibirás un correo electrónico con el número de seguimiento para que puedas consultar el estado de la entrega.
    </p>

    {{-- DEVOLUCIONES --}}
    <h2 class="mt-5">Devoluciones</h2>

    <h4 class="mt-3">Plazo para devolver</h4>
    <p class="text-dark">
        Dispones de un plazo de <strong>14 días naturales</strong> desde la recepción del pedido para solicitar una devolución.
    </p>

    <h4 class="mt-3">Condiciones de devolución</h4>
    <ul class="text-dark">
        <li>El libro debe estar en el mismo estado en el que fue recibido.</li>
        <li>No se aceptan devoluciones de libros con daños no indicados en la descripción.</li>
        <li>Los gastos de envío de la devolución corren a cargo del cliente, salvo error por parte de ReLibroManía.</li>
    </ul>

    <h4 class="mt-3">Cómo solicitar una devolución</h4>
    <p class="text-dark">
        Para iniciar una devolución, envíanos un correo a:
        <br><strong>devoluciones@relibromania.es</strong>
        <br>Incluye tu número de pedido y el motivo de la devolución.
    </p>

    <h4 class="mt-3">Reembolsos</h4>
    <p class="text-dark">
        Una vez recibamos el libro y verifiquemos su estado, procesaremos el reembolso en un plazo de 3 a 7 días laborables.
    </p>

</div>
@endsection

