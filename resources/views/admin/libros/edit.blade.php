{{-- Vista para editar libros en el panel de administración --}}

@extends('layouts.admin')

@section('title', 'Editar Libro')

@section('content')
<div class="container mt-5 text-center py-4" id="categoria-libros">
    <h1 style="color:#50C878;">Editar Libro</h1>

    <form action="{{ route('admin.libros.update', $libro) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <input type="text" name="titulo" value="{{ $libro->titulo }}" placeholder="Título" class="form-control mb-3">

        <input type="text" name="autor" value="{{ $libro->autor }}" placeholder="Autor" class="form-control mb-3">

        <input type="text" name="editorial" value="{{ $libro->editorial }}" placeholder="Editorial" class="form-control mb-3">

        <input type="number" step="0.01" name="precio" value="{{ $libro->precio }}" placeholder="Precio" class="form-control mb-3">

        <input type="text" name="estado" value="{{ $libro->estado }}" placeholder="Estado" class="form-control mb-3">

        <input type="text" name="isbn" value="{{ $libro->isbn }}" placeholder="ISBN" class="form-control mb-3">

        <textarea name="descripcion" class="form-control mb-3" placeholder="Descripción">{{ $libro->descripcion }}</textarea>

        <input type="text" name="imagen" value="{{ $libro->imagen }}" placeholder="URL de la imagen" class="form-control mb-3">

        {{-- Selector de género --}}
        <select name="genero" class="form-control mb-3">
            <option value="">Selecciona un género</option>
            <option value="fantasia" {{ $libro->genero == 'fantasia' ? 'selected' : '' }}>Fantasía</option>
            <option value="novela" {{ $libro->genero == 'novela' ? 'selected' : '' }}>Novela</option>
            <option value="terror" {{ $libro->genero == 'terror' ? 'selected' : '' }}>Terror</option>
            <option value="infantil" {{ $libro->genero == 'infantil' ? 'selected' : '' }}>Infantil</option>
            <option value="ciencia-ficcion" {{ $libro->genero == 'ciencia-ficcion' ? 'selected' : '' }}>Ciencia Ficción</option>
        </select>

        <button class="btn btn-lg"
                style="background:black; color:#50C878;; border:2px solid #50C878;">
            Actualizar
        </button>
    </form>
</div>
@endsection

