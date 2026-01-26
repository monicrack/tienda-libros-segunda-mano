@extends('layouts.admin')

@section('title', 'Añadir Libro')

@section('content')
<div class="container mt-5 text-center py-4" id="categoria-libros">
    <h1 style="color:#50C878;">Añadir Libro</h1>
    <div class="input-group mt-4">
        <input type="text" id="titulo_buscar" class="form-control" placeholder="Introduce un título" style="border-radius: 8px;">
        <button type="button" id="buscarGoogle" style="background:#50C878; color:white; font-weight:bolder; border-radius: 8px; border:2px solid #50C878;">
            Buscar en Google Books
        </button>
    </div>

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
@push('scripts')
<script>
    document.getElementById('buscarGoogle').addEventListener('click', function() {
        const titulo = document.getElementById('titulo_buscar').value;

        if (!titulo) {
            alert("Introduce un título para buscar");
            return;
        }

        fetch(`https://www.googleapis.com/books/v1/volumes?q=intitle:${encodeURIComponent(titulo)}`)
            .then(response => response.json())
            .then(data => {
                if (!data.items || data.items.length === 0) {
                    alert("No se encontró ningún libro con ese título");
                    return;
                }

                const info = data.items[0].volumeInfo;

                document.querySelector('input[name="titulo"]').value = info.title || '';
                document.querySelector('input[name="autor"]').value = info.authors ? info.authors.join(', ') : '';
                document.querySelector('input[name="editorial"]').value = info.publisher || '';
                document.querySelector('textarea[name="descripcion"]').value = info.description || '';
                document.querySelector('input[name="imagen"]').value = info.imageLinks ? info.imageLinks.thumbnail : '';
                document.querySelector('input[name="isbn"]').value = info.industryIdentifiers ? info.industryIdentifiers[0].identifier : '';
            })
            .catch(error => {
                console.error(error);
                alert("Error al conectar con Google Books");
            });
    });
</script>
@endpush