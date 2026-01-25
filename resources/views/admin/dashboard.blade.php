@extends('layouts.admin')

@section('title', 'Panel de Administración')

@section('content')
<div class="container-fluid d-flex flex-column justify-content-center text-center mt-5 py-4 bg-black" id="categoria-libros">
    <h1 style="color: #50C878;">Panel de Administración</h1>
    <p class="text-white">Bienvenido, administrador: {{ Auth::user()->name }}</p>

    <div class="d-flex justify-content-center gap-4 mt-4">
        <a href="{{ route('admin.libros.index') }}" 
           class="btn btn-lg"
           style="background:black; color:#D4AF37; border:2px solid #D4AF37;">
            Gestionar Libros
        </a>

        <a href="{{ route('admin.inventario') }}" 
           class="btn btn-lg"
           style="background:black; color:#D4AF37; border:2px solid #D4AF37;">
            Inventario
        </a>
    </div>
</div>
@endsection
