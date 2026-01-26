@extends('layouts.admin')

@section('title', 'Actualizar Stock')

@section('content')
<div class="container mt-5 text-center py-4">

    <h1 style="color:#50C878;">Actualizar Stock</h1>

    <p class="mt-3" style="color:white;">
        Libro: <strong>{{ $libro->titulo }}</strong>
    </p>

    <form action="{{ route('admin.inventario.stock.update', $libro) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <input type="number" name="stock" value="{{ $inventario->stock }}" 
               class="form-control mb-3 w-25 mx-auto text-center" placeholder="Cantidad en stock">

        <button class="btn btn-lg"
                style="background:black; color:#50C878; border:2px solid #50C878;">
            Guardar cambios
        </button>
    </form>

</div>
@endsection
