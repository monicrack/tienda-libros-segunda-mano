@extends('layouts.app')

@section('title', 'Vender libro a la tienda')

@section('content')
<div class="container-fluid d-flex flex-column justify-content-center text-center mt-5 py-4 bg-black" id="categoria-libros">

    <h2 class="mb-4" style="color:#D4AF37;">Vender libro a la tienda</h2>

    <form action="{{ route('ventas.guardar') }}" method="POST" class="bg-black p-4 rounded">
        @csrf

        {{-- Selección del libro --}}
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

        {{-- Cantidad --}}
        <div class="col-12 col-lg-8 mb-3 mx-auto">
            <label class="form-label text-white">Cantidad</label>
            <input type="number" name="cantidad" class="form-control text-center" min="1" value="1">
        </div>

        {{-- Precio que paga la tienda --}}
        <div class="mb-3 col-12 col-lg-8 mx-auto">
            <label class="form-label text-white">Precio que paga la tienda</label>
            <input type="number" step="0.01" name="precio_pagado" id="precioPagado" readonly class="form-control text-center">
        </div>

        {{-- Precio de venta en tienda (oculto, lo calcula JS) --}}
        <input type="hidden" name="precio_venta" id="precioVenta">

        {{-- Botón --}}
        <button class="btn btn-lg mt-2"
            style="background-color:black; color:#D4AF37; border:2px solid #D4AF37;">
            Registrar venta a la tienda
        </button>
    </form>

</div>

{{-- Script para actualizar precios --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('bookSelect');
        const precioPagado = document.getElementById('precioPagado');
        const precioVenta = document.getElementById('precioVenta');

        function actualizarPrecios() {
            const precioLibro = parseFloat(select.selectedOptions[0].dataset.precio);

            // Precio que paga la tienda (precio - 3)
            precioPagado.value = (precioLibro - 3).toFixed(2);

            // Precio de venta en tienda (precio original)
            precioVenta.value = precioLibro.toFixed(2);
        }

        select.addEventListener('change', actualizarPrecios);

        // Calcular al cargar la página
        actualizarPrecios();
    });
</script>

@endsection
