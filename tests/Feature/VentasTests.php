<?php

namespace Tests\Feature;

use Tests\TestCase;

class VentasTest extends TestCase
{
    /** Usuario autenticado ve ventas */
    public function test_usuario_autenticado_ve_mis_ventas()
    {
        $this->withoutMiddleware();
        $response = $this->get('/mis-compras-vendedor');
        $response->assertStatus(200);
    }

    /** Usuario no autenticado intenta vender */
    public function test_usuario_no_autenticado_intenta_vender_y_va_a_register()
    {
        $response = $this->post('/vender-cliente', [
            'libro_id' => 1,
            'cantidad' => 1,
        ]);
        $response->assertStatus(302);
    }
}
