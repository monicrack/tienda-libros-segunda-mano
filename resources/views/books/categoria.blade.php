{{-- Vista para mostrar los libros filtrados por categoría o género en la aplicación principal --}}

@extends('layouts.app')

@section('content')
    @include('components.lista-libros', [
        'books' => $books,
        'titulo' => $generoMostrar ?? 'Resultados de la búsqueda'
    ])
@endsection

