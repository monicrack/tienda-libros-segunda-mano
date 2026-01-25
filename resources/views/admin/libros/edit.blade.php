@extends('layouts.admin')

@section('title', 'Editar Libro')

@section('content')
<div class="container mt-5 text-centerpy-4" id="categoria-libros">
    <h1 style="color:#D4AF37;">Editar Libro</h1>

    <form action="{{ route('admin.libros.update', $libro) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <input type="text" name="titulo" value="{{ $libro->titulo }}" class="form-control mb-3">
        <input type="text" name="autor" value="{{ $libro->autor }}" class="form-control mb-3">

        <button class="btn btn-lg"
                style="background:black; color:#D4AF37; border:2px solid #D4AF37;">
            Actualizar
        </button>
    </form>
</div>
@endsection
