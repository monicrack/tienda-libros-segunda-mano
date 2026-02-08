<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

                return route('login', ['expired' => 1]);
            
        }
    }
    protected function sessionExpired() {

         return route('login', ['expired' => 1]); 
         
    }
}

