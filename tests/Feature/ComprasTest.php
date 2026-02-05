<?php

namespace Tests\Feature;

use Tests\TestCase;

class ComprasTest extends TestCase
{
    /** Usuario ve mis compras */
    public function test_usuario_autenticado_ve_mis_compras()
    {
        $this->withoutMiddleware();
        $response = $this->get('/mis-compras');
        $response->assertStatus(200);
    }

    /** Usuario no autenticado intenta comprar */
    public function test_usuario_no_autenticado_intenta_comprar_y_va_a_register()
    {
        $response = $this->post('/comprar-vendedor', [
            'libro_id' => 1,
            'cantidad' => 1,
        ]);
        $response->assertStatus(302);
    }
}


