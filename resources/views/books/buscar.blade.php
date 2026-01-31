{{-- Vista para mostrar los resultados de búsqueda de libros en la aplicación principal --}}

@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')
    @include('components.lista-libros', [
        'books' => $books,
        'titulo' => 'Resultados de la búsqueda'
    ])
@endsection
