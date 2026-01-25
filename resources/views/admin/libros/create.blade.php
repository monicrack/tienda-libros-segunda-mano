@extends('layouts.admin')

@section('title', 'Añadir Libro')

@section('content')
<div class="container mt-5 text-centerpy-4" id="categoria-libros">
    <h1 style="color:#D4AF37;">Añadir Libro</h1>

    <form action="{{ route('admin.libros.store') }}" method="POST" class="mt-4">
        @csrf

        <input type="text" name="titulo" placeholder="Título" class="form-control mb-3">
        <input type="text" name="autor" placeholder="Autor" class="form-control mb-3">

        <button class="btn btn-lg"
                style="background:black; color:#D4AF37; border:2px solid #D4AF37;">
            Guardar
        </button>
    </form>
</div>
@endsection
