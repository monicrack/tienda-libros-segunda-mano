{{-- Vista para mostrar las novedades de libros en la aplicación principal --}}

@extends('layouts.app')

@section('content')
    @include('components.lista-libros', [
        'books' => $books,
        'titulo' => 'Novedades'
    ])
@endsection
