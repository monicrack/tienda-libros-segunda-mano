<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompraVendedor;
use App\Models\Inventario;
use Illuminate\Support\Facades\Auth;

class CompraVendedorController extends Controller
{
    /******** Procesa la compra de un libro al vendedor *******/
    public function comprarAlVendedor(Request $request)
    {
        $request->validate([
            'book_id' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
            'precio_pagado' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
        ]);
        // Registrar compra a vendedor
        CompraVendedor::create([
            'vendedor_id' => Auth::id(),
            'book_id' => $request->book_id,
            'cantidad' => $request->cantidad,
            'precio_pagado' => $request->precio_pagado,
        ]);
        // Actualizar inventario de la tienda
        $item = Inventario::firstOrCreate(
            ['book_id' => $request->book_id],
            [
                'stock' => 0,
                'precio_venta' => $request->precio_venta,
                'estado' => 'usado'
            ]
        );

        $item->stock += $request->cantidad;
        $item->precio_venta = $request->precio_venta; 
        $item->save();

        return back()->with('success', 'Libro comprado al vendedor y añadido al inventario.');
    }
    /******** Muestra las compras realizadas por el vendedor *******/
    public function misComprasVendedor()
    {
        $compras = CompraVendedor::where('vendedor_id', Auth::id())->get();
        return view('ventas.miscompras', compact('compras'));
    }
    /******** Muestra el formulario para vender un libro *******/
    public function formularioVender()
    {
        $books = \App\Models\Book::all();
        return view('ventas.crear', compact('books'));
    }
}
