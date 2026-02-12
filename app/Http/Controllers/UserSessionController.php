<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserSessionController extends Controller
{
    public function logout(Request $request)
    {
        // Registrar logout
        DB::table('session_logs')->insert([
            'user_id' => Auth::id(),
            'action' => 'logout',
            'created_at' => now(),
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
