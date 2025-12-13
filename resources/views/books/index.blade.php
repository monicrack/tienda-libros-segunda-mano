@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')
    <h1>Resultados de búsqueda</h1>
    @forelse($books as $book)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $book->titulo }}</h5>
                <p>{{ $book->autor }}</p>
                <p>${{ $book->precio }}</p>
            </div>
        </div>
    @empty
        <p>No se encontraron libros.</p>
    @endforelse
@endsection

