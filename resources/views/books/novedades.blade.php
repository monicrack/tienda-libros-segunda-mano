@extends('layouts.app')

@section('content')
<div class="container-fluid bg-dark text-light py-4 mt-5" id="categoria-libros">
    <h2 class="text-center mb-4" style="color:#D4AF37;">Novedades</h2>
    <div class="row justify-content-center px-3">
        @forelse($books as $book)
            <div class="col-6 col-lg-3 mb-3">
                <div class="card h-100 bg-white text-dark text-center d-flex flex-column">
                    <div class="card-body d-flex flex-column align-items-center flex-grow-1">
                        @if($book->imagen)
                            <img src="{{ $book->imagen }}" alt="{{ $book->titulo }}" class="img-fluid mb-3" style="max-width:200px;">
                        @endif
                        <h5 class="card-title fw-bold">
                            <a href="{{ route('books.show', $book->id) }}" class="text-dark text-decoration-none">
                                {{ $book->titulo }}
                            </a>
                        </h5>
                        <p class="fw-bold text-dark">Autor: {{ $book->autor }}</p>
                        <p class="fw-bold text-success">{{ $book->precio }}€</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 mt-auto">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay novedades disponibles.</p>
        @endforelse
    </div>
</div>
@endsection

