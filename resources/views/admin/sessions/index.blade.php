@extends('layouts.admin')

@section('title', 'Sesiones e historial')

@section('content')
<div class="container-fluid mt-4">

   <div class="container-fluid d-flex flex-column justify-content-center text-center mt-5 py-4 bg-black" id="categoria-libros">
        <h1 style="color: #50C878;">Sesiones  e historial</h1>
        <p class="text-white">Bienvenido, administrador: {{ Auth::user()->name }}</p>
        <h2 style="color: #50C878;">Sesiones  activas</h2>
        <table class="table table-dark table-striped table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Usuario</th>
                    <th>IP</th>
                    <th>Dispositivo</th>
                    <th>Última actividad</th>
                    <th>Sesión ID</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
        <h2 class="mt-5" style="color:#50C878;">Historial de cierres de sesión</h2>

<table class="table table-dark table-striped table-bordered align-middle text-center mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Acción</th>
            <th>Fecha</th>
            <th>Desconexiones</th>

        </tr>
    </thead>

    <tbody>
        @foreach($logs as $log)
        <tr>
            <td>{{ $log->id }}</td>
            <td>{{ $log->name }}</td>
            <td>{{ $log->action }}</td>
            <td>{{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</td>
            <td>{{ $stats[$log->user_id]->logouts ?? 0 }}</td>

        </tr>
        @endforeach
    </tbody>
</table>

    </div>
</div>
@endsection