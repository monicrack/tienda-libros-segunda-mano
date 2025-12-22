@extends('layouts.app')

@section('title', 'Detalle del libro')

@section('content')
<div class="container-fluid bg-dark mt-5 py-4" id="categoria-libros">
    {{-- TITULO --}}
    <h2 class="text-center mb-4" style="color: #D4AF37;">Detalle del libro</h2>

    <div class="row justify-content-center">
        <div class="col-12  col-lg-8">
            <div class="card">
                <div class="card-body text-center">
                    @if($book->imagen)
                    <img src="{{ $book->imagen }}"
                        alt="{{ $book->titulo }}"
                        class="img-fluid mb-3 book-img">
                    @endif
                    <h2>{{ $book->titulo }}</h2>
                    <h5 class="text-muted">{{ $book->autor }}</h5>
                    <p class="fw-bold" style="color: #50C878">Precio: {{ $book->precio }}€</p>
                    <p class="text-start">{{ $book->descripcion ?? 'Sin descripción disponible.' }}</p>
                </div>
            </div>

            {{-- BOTONES --}}
            <div class="d-flex justify-content-between mt-4">

                {{-- Volver al listado --}}
                <a href="{{ route('books.novedades') }}" class="btn btn-primary">
                    Volver al listado
                </a>

                {{-- Comprar --}}
                <a href="#" class="btn btn-primary">
                    Comprar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection