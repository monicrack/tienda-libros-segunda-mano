<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Support\Facades\DB;

class AdminSessionController extends Controller
{
    public function index()
    {
        $sessions = Session::with('user')
            ->orderBy('last_activity', 'desc')
            ->get()
            ->map(function ($session) {

                // Última actividad
                $session->last_activity_human = \Carbon\Carbon::createFromTimestamp($session->last_activity)->diffForHumans();

                // Asegurar que tenemos user_id
                $userId = $session->user_id ?? ($session->user->id ?? null);

                if (!$userId) {
                    $session->last_logout = 'N/A';
                    return $session;
                }

                // Buscar último logout
                $lastLogout = DB::table('session_logs')
                    ->where('user_id', $userId)
                    ->orderBy('created_at', 'desc')
                    ->value('created_at');

                $session->last_logout = $lastLogout
                    ? \Carbon\Carbon::parse($lastLogout)->diffForHumans()
                    : 'Nunca';

                return $session;
            });

        return view('admin.sessions.index', compact('sessions'));
    }
}
