<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /*Redirige a los usuarios no autenticados a la página de registro */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            session(['url.intended' => url()->previous()]);
            return route('register');
        }
    }
}
