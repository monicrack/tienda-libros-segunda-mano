@extends('layouts.app')

@section('title', 'Detalle del libro')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2>{{ $book->titulo }}</h2>
            <h5 class="text-muted">{{ $book->autor }}</h5>
            <p class="fw-bold">Precio: ${{ $book->precio }}</p>
            <p>{{ $book->descripcion ?? 'Sin descripción disponible.' }}</p>
        </div>
    </div>
    <a href="{{ route('books.index') }}" class="btn btn-outline-dark mt-3">Volver al listado</a>
</div>
@endsection
