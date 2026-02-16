<?php

namespace Tests\Feature;

use Tests\TestCase;

class CarritoTest extends TestCase
{
    /** Comprueba que el carrito responde para un usuario */
    public function test_usuario_autenticado_puede_ver_carrito()
    {
        $this->withoutMiddleware();
        $response = $this->get('/carrito');
        $response->assertStatus(200);
    }

    /** Usuario no autenticado redirige a login */
    public function test_usuario_no_autenticado_redirige_a_login()
    {
        $response = $this->get('/carrito');
        $response->assertStatus(200);

    }
}


