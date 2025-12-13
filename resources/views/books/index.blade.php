@extends('layouts.app')

@section('title', 'Catálogo')

@section('content')
    <h2>Catálogo de libros</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Título del libro</h5>
                    <p class="card-text">Autor</p>
                    <p><strong>10 €</strong></p>
                    <a href="#" class="btn btn-primary btn-sm">Ver detalle</a>
                </div>
            </div>
        </div>
    </div>
@endsection
