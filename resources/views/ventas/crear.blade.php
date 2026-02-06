{{-- Vista para crear una nueva venta de libro a la tienda.
     Permite seleccionar un libro del catálogo, especificar la cantidad
     y muestra el precio que la tienda pagará por el libro.
     Incluye información sobre cómo se realiza la valoración del libro. --}}

@extends('layouts.app')

@section('title', 'Vender libro a la tienda')

@section('content')
<div class="container-fluid d-flex flex-column justify-content-center text-center mt-5 py-4 bg-black" id="categoria-libros">

    <h2 class="mb-4" style="color:#D4AF37;">Vender libro a la tienda</h2>

    <!-- Sección informativa sobre la valoración -->
    <div class="col-12 col-lg-8 mx-auto mb-4">
        <div class="p-3 rounded" style="background-color:#111; border:1px solid #D4AF37;">
            <h4 class="text-center mb-3" style="color:#D4AF37;">Información sobre la valoración del libro</h4>

            <p class="text-white" style="line-height:1.6;">
                El precio mostrado como <strong>“Precio que paga la tienda”</strong> es una
                <strong>estimación máxima</strong> basada en el valor del libro en catálogo.
            </p>

            <p class="text-white" style="line-height:1.6;">
                Una vez recibamos el libro y comprobemos su estado real
                (conservación, subrayados, edición, demanda…), realizaremos una
                <strong>valoración exacta</strong>.
            </p>

            <p class="text-white fw-bold" style="line-height:1.6;">
                Si el estado coincide con lo indicado, recibirás el importe máximo.
                Si no, ajustaremos la valoración de forma justa y transparente.
                Puedes aceptar o rechazar la oferta final.
                Toda la información en
                <a href="{{ route('legal.condiciones') }}" style="color: #D4AF37; text-decoration: none; font-weight: bold;">
                    "Condiciones de venta"</a>
            </p>
            <p class="text-white" style="line-height:1.6;">
                Si el libro no existe en el catálogo deberás rellenar el formulario de
                <a href="{{ route('sell') }}" style="color: #D4AF37; text-decoration: none; font-weight: bold;">
                    “Compramos tus libros” </a>
            </p>
        </div>

        <form action="{{ route('ventas.guardar') }}" method="POST" class="bg-black p-4 rounded">
            @csrf

            <!-- Sección libro -->
            <div class="col-12 col-lg-8 mb-3 mx-auto">
                <label class="form-label text-white">Selecciona el libro</label>
                <select name="book_id" id="bookSelect" class="form-select text-center">
                    @foreach($books as $book)
                    <option value="{{ $book->id }}" data-precio="{{ $book->precio }}">
                        {{ $book->titulo }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-lg-8 mb-3 mx-auto">
                <label class="form-label text-white">Cantidad</label>
                <input type="number" name="cantidad" class="form-control text-center" min="1" value="1">
            </div>

            <div class="mb-3 col-12 col-lg-8 mx-auto">
                <label class="form-label text-white">Precio que paga la tienda</label>
                <input type="number" step="0.01" name="precio_pagado" id="precioPagado" readonly class="form-control text-center">
            </div>

            <input type="hidden" name="precio_venta" id="precioVenta">

            <button class="btn btn-lg mt-2"
                style="background-color:black; color:#D4AF37; border:2px solid #D4AF37;">
                Registrar venta a la tienda
            </button>
        </form>

    </div>

    <!-- Actualizar precios -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('bookSelect');
            const precioPagado = document.getElementById('precioPagado');
            const precioVenta = document.getElementById('precioVenta');

            function actualizarPrecios() {
                const precioLibro = parseFloat(select.selectedOptions[0].dataset.precio);

                // Precio que paga la tienda 
                precioPagado.value = (precioLibro - 4).toFixed(2);

                // Precio de venta en tienda 
                precioVenta.value = precioLibro.toFixed(2);
            }

            select.addEventListener('change', actualizarPrecios);


            actualizarPrecios();
        });
    </script>

    @endsection