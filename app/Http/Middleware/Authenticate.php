<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            // Si había cookie de sesión pero ya no hay usuario 
            if ($request->hasCookie(config('session.cookie')) && !Auth::check()) {
                return route('login', ['expired' => 1]);
            }

            // Usuario nunca logueado 
            return route('register');
        }
    }
}

