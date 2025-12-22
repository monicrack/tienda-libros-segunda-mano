@extends('layouts.app')

@section('content')
    @include('components.lista-libros', [
        'books' => $books,
        'titulo' => 'Novedades'
    ])
@endsection
