@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="text-center mt-5">
    <h1>Bienvenido a tu tienda de libros de segunda mano</h1>
    <h3 style="color:#D4AF37;">Compra y vende libros usados de forma sencilla</h3>

    <img src="{{ asset('images/ui/portada.webp') }}"
        alt="Portada de libros"
        class="img-fluid mt-4"
        style="max-width: 500px;">
</div>

@endsection