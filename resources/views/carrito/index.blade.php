@extends('layouts.app')

@section('title', 'Mi Carrito')

@section('content')
<div class="container-fluid d-flex flex-column justify-content-center text-center mt-5 py-4 bg-black" id="categoria-libros">

    <h2 class="mb-4" style="color: #D4AF37;">Mi Carrito</h2>

    @if(empty($carrito))
    <p style="color: white;">No hay libros en el carrito.</p>
    @else
    <div class="col-12 ">
        <table class="table table-white table-striped">
            <thead>
                <tr>
                    <th class="text-start">Libro</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp

                @foreach($carrito as $item)
                @php $total += $item['precio'] * $item['cantidad']; @endphp

                <tr>
                    <td class="text-start">{{ $item['titulo'] }}</td>
                    <td>{{ $item['cantidad'] }}</td>
                    <td>{{ $item['precio'] }} €</td>
                    <td>{{ $item['precio'] * $item['cantidad'] }} €</td>
                    <td>
                        <form action="{{ route('carrito.eliminar', $item['id']) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="3" class="text-end fw-bold">Total:</td>
                    <td class="fw-bold">{{ $total }} €</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center gap-3 mt-4">

        {{-- Seguir comprando --}}
        @php
        $categoria = session('ultima_categoria', 'todos');

        // Ajuste para ciencia ficción
        if ($categoria === 'ciencia-ficcion') {
        $categoria = 'cienciaficcion';
        }
        @endphp

        <a href="{{ route('libros.' . $categoria) }}"
            class="btn btn-outline-light btn-lg"
            style="color:#D4AF37; border:2px solid #D4AF37;">
            Seguir comprando
        </a>

        {{-- Comprar --}}
        <form action="{{ route('carrito.finalizar') }}" method="POST">
            @csrf
            <button class="btn btn-outline-light btn-lg"
                style="color:#D4AF37; border:2px solid #D4AF37;">
                Comprar
            </button>
        </form>


        {{-- Vaciar carrito --}}
        <form action="{{ route('carrito.vaciar') }}" method="POST">
        @csrf
        <button class=" btn btn-lg boton-vaciar">
            Vaciar carrito
            </button>
        </form>
    </div>

    @endif

</div>
@endsection