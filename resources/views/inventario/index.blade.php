{{-- Vista para mostrar el inventario completo de la tienda.
     Lista todos los libros disponibles junto con su stock, precio de venta
     y estado actual. Esta vista está pensada para consulta interna o administrativa --}}

@extends('layouts.app')

@section('title', 'Inventario de la tienda')

@section('content')
<div class="container-fluid d-flex flex-column justify-content-center text-center mt-5 py-4 bg-black" id="categoria-libros">

    <h2 class="mb-4" style="color:#D4AF37;">Inventario de la tienda</h2>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="text-start">Libro</th>
                <th>Stock</th>
                <th>Precio venta</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventario as $item)
            <tr>
                <td class="text-start">{{ $item->libro->titulo }}</td>
                <td>{{ $item->stock }}</td>
                <td>{{ $item->precio_venta }} €</td>
                <td>{{ $item->estado }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
