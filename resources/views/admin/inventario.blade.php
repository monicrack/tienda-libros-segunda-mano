{{-- Vista del panel de administración para la gestión del inventario de libros.
     Permite al administrador editar, borrar y gestionar el stock de los libros disponibles --}}

@extends('layouts.admin')

@section('title', 'Inventario')

@section('content')
<div class="container mt-5 text-center py-4" id="categoria-libros">
    <h1 style="color:#D4AF37;">Inventario</h1>

    <p class="text-white mt-3">Aquí podrás editar, borrar y gestionar el stock de los libros.</p>

    <table class="table table-dark table-striped table-bordered align-middle text-center">
        <thead style="background:black; color:#D4AF37;">
            <tr>
                <th>ID</th>
                <th>Portada</th>
                <th>Título</th>
                <th>Stock</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>

                <td>
                    @if($libro->imagen)
                    <img src="{{ $libro->imagen }}" style="width:60px;">
                    @else
                    <span class="text-secondary">Sin imagen</span>
                    @endif
                </td>

                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->inventario->stock ?? 0 }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->genero }}</td>
                <td>{{ $libro->precio }} €</td>
                <td>{{ $libro->estado }}</td>

                <td class="">

                    {{-- Botón Editar --}}
                    <a href="{{ route('admin.libros.edit', $libro) }}"
                        class="btn btn-sm "
                        style="background:black; color:#50C878; border:1px solid #50C878;">
                        Editar
                    </a>
                    {{-- Botón Stock --}}
                    <a href="{{ route('admin.inventario.stock.edit', $libro) }}"
                        class="btn btn-sm mt-3"
                        style="background:black; color:#D4AF37; border:1px solid #D4AF37;">
                        Stock
                    </a>

                    {{-- Botón Borrar --}}
                    <form action="{{ route('admin.libros.destroy', $libro) }}"
                        method="POST"
                        onsubmit="return confirm('¿Estás segura de que quieres eliminar este libro?');">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm mt-3"
                            style="background:black; color:#E63946; border:1px solid #E63946;">
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