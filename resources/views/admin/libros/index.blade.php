{{-- Vista del panel de administración para la gestión de libros.
     Muestra un listado completo de todos los libros registrados en la plataforma,
     permitiendo al administrador añadir nuevos libros, editarlos o eliminarlos --}}

@extends('layouts.admin')

@section('title', 'Gestión de Libros')

@section('content')
<div class="container-fluid  text-center py-4" id="categoria-libros">
    <h1 style="color:#50C878;">Gestión de Libros</h1>

    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr style="color:#50C878;">
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>ISBN</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->editorial }}</td>
                <td>{{ $libro->precio }}</td>
                <td>{{ $libro->estado }}</td>
                <td>{{ $libro->isbn }}</td>
                <td>{{ Str::limit($libro->descripcion, 40) }}</td>
                <td>
                    @if($libro->imagen)
                    <img src="{{ $libro->imagen }}"
                        alt="Portada"
                        style="width:60px; height:auto; border-radius:4px;">
                    @else
                    <span class="text-secondary">Sin imagen</span>
                    @endif

                </td>
                <td>{{ $libro->created_at->format('d/m/Y') }}</td>
                <td>{{ $libro->updated_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.libros.create') }}"
                    class="btn btn-sm mb-2"
                        style="background:black; color:#D4AF37;; border:1px solid #D4AF37;">
                       Añadir
                    </a>
                    <a href="{{ route('admin.libros.edit', $libro) }}"
                        class="btn btn-sm"
                        style="background:black; color:#50C878; border:1px solid #50C878;">
                        Editar
                    </a>
                    <form action="{{ route('admin.libros.destroy', $libro) }}"
                        method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm mt-2 "
                            style="background:black; color:#E63946; border:1px solid #E63946;"
                            onclick="return confirm('¿Estás segur@ de que quieres eliminar este libro?');">
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