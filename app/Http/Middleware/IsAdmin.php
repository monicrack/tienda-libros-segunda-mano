<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /******* Verifica que el usuario es administrador *******/
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso no autorizado');
        }

        return $next($request);
    }
}
