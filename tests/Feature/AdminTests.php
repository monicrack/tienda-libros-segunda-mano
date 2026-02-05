<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminTest extends TestCase
{
    /** Comprueba que un usuario simulado accede al dashboard */
    public function test_admin_accede_a_dashboard()
    {
        $this->withoutMiddleware(); 
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

    /** Comprueba que un usuario no admin es redirigido */
    public function test_usuario_no_admin_no_accede_a_dashboard()
    {
        $response = $this->get('/admin');
        $response->assertStatus(302); // Redirección
    }
}

