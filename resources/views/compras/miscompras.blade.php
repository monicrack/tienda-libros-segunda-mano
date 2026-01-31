{{-- Vista para mostrar el historial de compras del usuario --}}

@extends('layouts.app')

@section('title', 'Mis compras')

@section('content')
<div class="container-fluid d-flex flex-column justify-content-center text-center py-4 bg-black" id="categoria-libros">

    <h2 class="mb-4" id="libros" style="color:#D4AF37;">Mis compras</h2>
    
    <table class="table table-white table-striped">
        <thead>
            <tr>
                <th class="text-start">Libro</th>
                <th>Cantidad</th>
                <th>Precio total</th>
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
                <td>{{ number_format($compra->precio_venta, 2) }} €</td>
                <td>{{ $compra->created_at->format('d/m/Y') }}</td>
            </tr>
            @php
            $totalGeneral += $compra->cantidad * $compra->precio_venta;
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