@extends('layouts.admin')

@section('title', 'Resultados de búsqueda')

@section('content')
<div class="container text-centerpy-4" id="categoria-libros">

    <h2 class="mb-4" style="color:#D4AF37;">
        Resultados para: "{{ $query }}"
    </h2>

    @if($books->isEmpty())
        <p class="text-white">No se encontraron libros.</p>
    @else
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->titulo }}</td>
                        <td>{{ $book->autor }}</td>
                        <td>
                            <a href="{{ route('admin.libros.edit', $book->id) }}"
                               class="btn btn-sm"
                               style="background:black; color:#D4AF37; border:1px solid #D4AF37;">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
