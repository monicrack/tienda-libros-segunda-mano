{{-- Vista para el formulario de inicio de sesión de usuarios --}}

@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="container-fluid d-flex justify-content-center mt-5 py-4 bg-black" id="categoria-libros">
    <div class="col-12 col-lg-6">

        <div class="card shadow">
            <div class="card-body">


                <h2 class="text-center mb-4">Iniciar sesión</h2>
                @if(session('success'))
                <div class="alert text-light text-center mb-0">
                    {{ session('success') }}
                </div> @endif

                @if(request()->has('expired'))
                <div class="alert text-center" style="background-color:#D4AF37; color:#000; font-weight:bold;">
                   Por favor, inicia sesión  para continuar. <br>
                   Tu sesión  puede haber expirado por inactividad.
                </div>
                @endif


                @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>

                </form>
                <p class="text-center mt-3">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="fw-bold" style="color:#50C878; text-decoration: none;">Registrate para Iniciar Sesión</a>
                </p>
            </div>
        </div>

    </div>
</div>
@endsection