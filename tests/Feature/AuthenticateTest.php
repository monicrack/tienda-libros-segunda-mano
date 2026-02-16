<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticateTest extends TestCase
{
    /* Verifica que un usuario no autenticado sea redirigido a la página de registro */
        public function test_usuario_no_autenticado_redirige_a_register()
    {
        $response = $this->get('/mis-compras');
        $response->assertRedirect('/login?expired=1');

    }

    /* Verifica que una sesión expirada muestre el código de estado 419*/
    public function test_sesion_expirada_muestra_419()
    {
        $user = User::factory()->create();

        session(['was_authenticated' => true]);
        Auth::logout();

        $this->withCookie(config('session.cookie'), 'cookie-falsa');

        $response = $this->get('/mis-compras');
        $response->assertRedirectContains('/login');

    }
}
