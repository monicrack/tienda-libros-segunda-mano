@extends('layouts.admin')

@section('title', 'Actualizar Libros')

@section('content')
<div class="container-fluid  text-center py-4" id="categoria-libros">
    <h1 style="color:#50C878;">Actualizar libros</h1>
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
                    <a href="{{ route('admin.libros.edit', $libro) }}"
                        class="btn btn-lg"
                        style="background:black; color:#50C878; border:2px solid #50C878;">
                        Actualizar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection