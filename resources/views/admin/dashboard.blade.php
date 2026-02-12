{{-- Vista del panel de administración principal --}}

@extends('layouts.admin')

@section('title', 'Panel de Administración')

@section('content')
<div class="container-fluid d-flex flex-column justify-content-center text-center mt-5 py-4 bg-black" id="categoria-libros">
    <h1 style="color: #50C878;">Panel de Administración</h1>
    <p class="text-white">Bienvenido, administrador: {{ Auth::user()->name }}</p>

    <div class="d-flex justify-content-center gap-4 mt-4">
        <a href="{{ route('admin.libros.create') }}" 
           class="btn btn-lg"
           style="background:black; color:#50C878; border:2px solid #50C878;">
            Añadir Libros
        </a>
        <a href="{{ route('admin.libros.actualizar') }}" 
           class="btn btn-lg"
           style="background:black; color:#50C878; border:2px solid #50C878;">
            Actualizar Libros
        </a>
        <a href="{{ route('admin.libros.delete') }}" 
           class="btn btn-lg"
           style="background:black; color:#50C878; border:2px solid #50C878;">
            Eliminar Libros
        </a>

        <a href="{{ route('admin.inventario') }}" 
           class="btn btn-lg"
           style="background:black; color:#50C878; border:2px solid #50C878;">
            Inventario
        </a>

         <a href="{{ route('admin.sesiones') }}" 
           class="btn btn-lg"
           style="background:black; color:#50C878; border:2px solid #50C878;">
            Sesiones Activas
        </a>
    </div>
</div>
@endsection
