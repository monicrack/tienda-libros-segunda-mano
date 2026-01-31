{{-- Vista donde el usuario puede consultar todas las ventas que ha realizado a la tienda.
     Muestra cada operación con el libro vendido, la cantidad, el precio pagado
     y la fecha de la transacción. También calcula el total general obtenido --}}

@extends('layouts.app')

@section('title', 'Mis ventas a la tienda')

@section('content')
<div class="container-fluid d-flex flex-column text-center mt-5 bg-black" id="categoria-libros">

    <h2 class="mb-4 mt-5 mt-lg-0" style="color:#D4AF37;">Mis ventas a la tienda</h2>

    <table class="table table-white table-striped">
        <thead>
            <tr>
                <th class="text-start">Libro</th>
                <th>Cantidad</th>
                <th>Precio pagado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalGeneral = 0;
            @endphp

            @foreach($compras as $compra)
            <tr>
                <td class="text-start">{{ $compra->libro->titulo }}</td>
                <td>{{ $compra->cantidad }}</td>
                <td>{{ number_format($compra->precio_pagado, 2) }} €</td>
                <td>{{ $compra->created_at->format('d/m/Y') }}</td>
            </tr>
            
            @php
            $totalGeneral += $compra->cantidad * $compra->precio_pagado;
            @endphp

            @endforeach

            {{-- TOTAL GENERAL --}}
            <tr class="fw-bold">
                <td class="text-start">TOTAL</td>
                <td></td>
                <td>{{ number_format($totalGeneral, 2) }} €</td>
                <td></td>
            </tr>
        </tbody>
    </table>

</div>
@endsection