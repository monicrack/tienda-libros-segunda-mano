<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Support\Facades\DB;

class AdminSessionController extends Controller
{
    public function index()
    {
        // Sesiones activas
        $sessions = Session::with('user')
            ->orderBy('last_activity', 'desc')
            ->get()
            ->map(function ($session) {
                $session->last_activity_human = \Carbon\Carbon::createFromTimestamp($session->last_activity)->diffForHumans();
                return $session;
            });

        // Historial de cierres de sesión (TODOS)
        $logs = DB::table('session_logs')
            ->join('users', 'session_logs.user_id', '=', 'users.id')
            ->select('session_logs.*', 'users.name')
            ->orderBy('session_logs.created_at', 'desc')
            ->get();
        // Conteo de conexiones y desconexiones 
        $stats = DB::table('session_logs')
            ->select(
                'user_id',
                DB::raw("SUM(CASE WHEN action = 'logout' THEN 1 ELSE 0 END) as logouts")
            )
            ->groupBy('user_id')
            ->get()
            ->keyBy('user_id');

        return view('admin.sessions.index', compact('sessions', 'logs', 'stats'));
    }
}
