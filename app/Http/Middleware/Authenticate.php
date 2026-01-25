<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            // Guardamos la URL previa para volver después del login
            session(['url.intended' => url()->previous()]);

            return route('register');
        }
    }
}
