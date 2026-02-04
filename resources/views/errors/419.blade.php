@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex flex-column justify-content-center text-center py-4 bg-black" id="categoria-libros">
    <h2 class="mb-4" id="libros" style="color:#D4AF37;">Tu sesión ha expirado</h2>
    <p style="color:#50C878;">Por seguridad, debes iniciar sesión nuevamente.</p>

    <script>
        setTimeout(() => {
            window.location.href = "{{ route('login') }}";
        }, 3000);
    </script>
</div>
@endsection
