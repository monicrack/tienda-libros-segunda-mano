@extends('layouts.admin')

@section('title', 'Sesiones Activas e historial')

@section('content')
<div class="container-fluid mt-4">

   <div class="container-fluid d-flex flex-column justify-content-center text-center mt-5 py-4 bg-black" id="categoria-libros">
    <h1 style="color: #50C878;">Sesiones Activas e historial</h1>
    <p class="text-white">Bienvenido, administrador: {{ Auth::user()->name }}</p>

    <table class="table table-dark table-striped table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Usuario</th>
                <th>IP</th>
                <th>Dispositivo</th>
                <th>Última actividad</th>
                <th>Sesión ID</th>
                <th>Último cierre de sesión</th>
            </tr>
        </thead>

        <tbody>
            @foreach($sessions as $session)
            <tr>
                <td>{{ $session->user->name ?? 'Invitado' }}</td>
                <td>{{ $session->ip_address }}</td>
                <td style="max-width: 300px; word-break: break-word;">
                    {{ $session->user_agent }}
                </td>
                <td>{{ $session->last_activity_human }}</td>
                <td>{{ $session->id }}</td>
                <td>{{ $session->last_logout }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2 class="mt-5" style="color:#50C878;">Historial de cierres de sesión</h2>
    </div>
</div>
@endsection