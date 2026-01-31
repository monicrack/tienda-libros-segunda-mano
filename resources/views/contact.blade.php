{{-- Vista de contacto donde los usuarios pueden enviar mensajes a la tienda.
     Incluye un formulario para nombre, email, mensaje y aceptación de la política de privacidad.
     También muestra información de contacto y detalles sobre la protección de datos. --}}

@extends('layouts.app')

@section('content')
<div class="container-fluid bg-dark text-light py-4 mt-5" id="categoria-libros">

    <h1 class="text-center mb-4" style="color:#D4AF37;">Contacto</h1>

    <p class="text-white text-center mb-5">
        ¿Tienes dudas, sugerencias o quieres vender tus libros?
        En <strong>ReLibroManía</strong> estamos aquí para ayudarte.
    </p>

    <div class="row g-4">

        <!-- FORMULARIO DE CONTACTO -->
        <div class="col-12 col-lg-8">
            <div class="card shadow-lg p-4 h-100">

                <h3 class="mb-4" style="color:#D4AF37;">Envíanos un mensaje</h3>

                @if(session('success_contact'))
                <div class="alert alert-success">{{ session('success_contact') }}</div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mensaje</label>
                        <textarea name="mensaje" class="form-control" rows="7" required></textarea>
                    </div>

                    <!-- CHECKBOX LEGAL -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="privacidad" required>
                        <label class="form-check-label">
                            Acepto la <a href="{{ route('privacidad') }}" target="_blank" style="color:#50C878;">Política de Privacidad</a>.
                        </label>
                    </div>

                    <button type="submit" class="btn btn-lg" style="background-color:#50C878; color:white;">
                        Enviar mensaje
                    </button>
                </form>
            </div>
        </div>

        <!-- COLUMNA DERECHA: INFORMACIÓN DE CONTACTO -->
        <div class="col-12 col-lg-4">
            <div class="card shadow-lg p-4 h-100">

                <h3 class="mb-4" style="color:#D4AF37;">Información de contacto</h3>
                <hr>
                <p class="mb-3 mt-4">
                    <strong>Email:</strong><br>
                    libros@relibromania.es
                </p>

                <p class="mb-4">
                    <strong>Teléfono:</strong><br>
                    +34 000 000 000
                </p>

                <p class="mb-4">
                    <strong>Horario:</strong><br>
                    Lunes a Viernes, 9:00 – 18:00<br>
                    Sábados: 10 a 14 horas<br>
                    Domingos y festivos: cerrados
                </p>

                <hr>

                <h5 class="mt-4" style="color:#D4AF37;">Protección de datos</h5>
                <p class="small text-muted" style="font-size: 0.85rem;">
                    ReLibroManía tratará sus datos únicamente para responder a sus consultas.
                </p>
                <p class="small text-muted" style="font-size: 0.85rem;">
                    Puede ejercer sus derechos tal como se indica en nuestra Política de Privacidad y Aviso Legal.
                </p>
            </div>
        </div>

    </div>

</div>
@endsection