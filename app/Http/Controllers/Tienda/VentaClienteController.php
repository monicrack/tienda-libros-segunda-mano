<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VentaCliente;
use App\Models\Inventario;
use Illuminate\Support\Facades\Auth;

class VentaClienteController extends Controller
{
    /******** Procesa la venta de un libro al cliente *******/
    public function venderAlCliente(Request $request)
    {
        $request->validate([
            'book_id' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
            'precio_venta' => 'required|numeric|min:0',
        ]);
        VentaCliente::create([
            'comprador_id' => Auth::id(),
            'book_id' => $request->book_id,
            'cantidad' => $request->cantidad,
            'precio_venta' => $request->precio_venta,
        ]);
        $item = Inventario::where('book_id', $request->book_id)->first();

        if ($item) {
            $item->stock -= $request->cantidad;

            if ($item->stock < 0) {
                $item->stock = 0;
            }

            $item->save();
        }
        return back()->with('success', 'Compra realizada con éxito.');
    }
    /******** Muestra las compras realizadas por el cliente *******/
    public function misComprasCliente()
    {
        $compras = VentaCliente::where('comprador_id', Auth::id())->get();
        return view('compras.miscompras', compact('compras'));
    }
}
