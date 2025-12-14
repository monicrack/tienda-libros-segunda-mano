@extends('layouts.app')

@section('content')
    <h1>Novedades</h1>
    <ul>
        @foreach($books as $book)
            <li>{{ $book->title }} - {{ $book->author }}</li>
        @endforeach
    </ul>
@endsection
