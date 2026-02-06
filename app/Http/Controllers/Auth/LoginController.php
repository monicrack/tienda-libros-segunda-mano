<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /******** Muestra el formulario de login *******/
    public function showLoginForm()
    {
        return view('auth.login');
    }
    /******** Procesa el login del usuario *******/
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->authenticated($request, Auth::user());
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ]);
    }
    /******** Redirige según el rol del usuario tras el login *******/
    protected function authenticated($request, $user)
    {
        session(['was_authenticated' => true]);
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect('/'); // comprador
    }
    /******** Cierra la sesión del usuario *******/
    public function logout(Request $request)
    {
        // Eliminar todas las sesiones del usuario en la tabla sessions 
        DB::table('sessions')->where('user_id', Auth::id())->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Has cerrado sesión correctamente.');
    }
}
