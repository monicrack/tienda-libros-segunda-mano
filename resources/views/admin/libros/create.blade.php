@extends('layouts.admin')

@section('title', 'Añadir Libro')

@section('content')
<div class="container mt-5 text-center py-4" id="categoria-libros">
    <h1 style="color:#50C878;">Añadir Libro</h1>

    <form action="{{ route('admin.libros.store') }}" method="POST" class="mt-4">
        @csrf

        <input type="text" name="titulo" placeholder="Título" class="form-control mb-3" required>
        <input type="text" name="autor" placeholder="Autor" class="form-control mb-3">
        <input type="text" name="editorial" placeholder="Editorial" class="form-control mb-3">
        <input type="number" step="0.01" name="precio" placeholder="Precio" class="form-control mb-3">
        <input type="text" name="estado" placeholder="Estado (Nuevo, Usado...)" class="form-control mb-3">
        <input type="text" name="isbn" placeholder="ISBN" class="form-control mb-3">
        <select name="genero" class="form-control mb-3">
            <option value="">Selecciona un género</option>
            <option value="fantasia">Fantasía</option>
            <option value="novela">Novela</option>
            <option value="terror">Terror</option>
            <option value="infantil">Infantil</option>
            <option value="ciencia-ficcion">Ciencia Ficción</option>
        </select>
        <textarea name="descripcion" placeholder="Descripción" class="form-control mb-3"></textarea>

        <input type="text" name="imagen" placeholder="URL de la imagen (Google Books)" class="form-control mb-3">

        <button class="btn btn-lg"
            style="background:black; color:#50C878;; border:2px solid #50C878;">
            Guardar
        </button>
    </form>
</div>
@endsection