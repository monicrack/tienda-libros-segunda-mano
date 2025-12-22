@extends('layouts.app')

@section('title', 'Registro de usuario')

@section('content')
<div class="container-fluid d-flex justify-content-center mt-5 py-4 bg-black" id ="categoria-libros">
    <div class="col-12 col-lg-6">

        <div class="card shadow">
            <div class="card-body">

                <h2 class="text-center mb-4">Crear cuenta</h2>

                {{-- Mensajes de error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Formulario de registro --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autofocus>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required>
                    </div>

                    {{-- Contraseña --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required>
                    </div>

                    {{-- Confirmación --}}
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                        <input id="password_confirmation" type="password"
                               class="form-control"
                               name="password_confirmation" required>
                    </div>

                    {{-- Botón --}}
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">
                            Registrarse
                        </button>
                    </div>

                </form>

                {{-- Enlace a login --}}
                <p class="text-center mt-3">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}">Inicia sesión</a>
                </p>

            </div>
        </div>

    </div>
</div>
@endsection
