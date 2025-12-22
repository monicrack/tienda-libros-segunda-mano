@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')
    @include('components.lista-libros', [
        'books' => $books,
        'titulo' => 'Resultados de la búsqueda'
    ])
@endsection
