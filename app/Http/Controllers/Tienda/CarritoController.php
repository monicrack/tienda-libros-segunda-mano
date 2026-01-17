<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    public function agregar($id)
    {
        $book = Book::findOrFail($id);

        $carrito = session('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'id' => $book->id,
                'titulo' => $book->titulo,
                'precio' => $book->precio,
                'imagen' => $book->imagen,
                'cantidad' => 1,
            ];
        }

        session(['carrito' => $carrito]);

        return back()->with('success', 'Libro añadido al carrito.');
    }

    public function eliminar($id)
    {
        $carrito = session('carrito', []);

        if (isset($carrito[$id])) {

            // Si hay más de 1, restamos uno
            if ($carrito[$id]['cantidad'] > 1) {
                $carrito[$id]['cantidad']--;
            } else {
                // Si solo queda 1, eliminamos la línea
                unset($carrito[$id]);
            }
        }

        session(['carrito' => $carrito]);

        return back();
    }


    public function vaciar()
    {
        session()->forget('carrito');
        return back();
    }
    public function finalizarCompra()
{
    $carrito = session('carrito', []);

    if (empty($carrito)) {
        return back()->with('error', 'El carrito está vacío.');
    }

    // Recorremos cada libro del carrito
    foreach ($carrito as $item) {

        // Registramos la venta al cliente usando el controlador de ventas
        app(\App\Http\Controllers\Tienda\VentaClienteController::class)->venderAlCliente(
            new \Illuminate\Http\Request([
                'book_id' => $item['id'],
                'cantidad' => $item['cantidad'],
                'precio_venta' => $item['precio']
            ])
        );
    }

    // Vaciar carrito después de comprar
    session()->forget('carrito');

    return redirect()->route('compras.cliente')->with('success', 'Compra realizada con éxito.');
}

}
