<?php

namespace Tests\Feature;

use Tests\TestCase;

class InventarioTest extends TestCase
{
    /** Admin ve inventario */
    public function test_admin_puede_ver_inventario()
    {
        $this->withoutMiddleware();
        $response = $this->get('/inventario');
        $response->assertStatus(200);
    }

    /** Usuario normal no ve inventario */
    public function test_usuario_normal_no_puede_ver_inventario()
    {
        $response = $this->get('/inventario');
        $response->assertStatus(302);
    }
}



