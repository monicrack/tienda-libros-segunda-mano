@extends('layouts.admin')

@section('title', 'Gestión de Libros')

@section('content')
<div class="container mt-5 text-centerpy-4" id="categoria-libros">
    <h1 style="color:#D4AF37;">Gestión de Libros</h1>

    <a href="{{ route('admin.libros.create') }}" 
       class="btn btn-lg mt-4"
       style="background:black; color:#D4AF37; border:2px solid #D4AF37;">
        Añadir Libro
    </a>

    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr style="color:#D4AF37;">
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>
                    <a href="{{ route('admin.libros.edit', $libro) }}" 
                       class="btn btn-sm"
                       style="background:black; color:#D4AF37; border:1px solid #D4AF37;">
                        Editar
                    </a>

                    <form action="{{ route('admin.libros.destroy', $libro) }}" 
                          method="POST" 
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm"
                                style="background:black; color:#D4AF37; border:1px solid #D4AF37;">
                            Borrar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
