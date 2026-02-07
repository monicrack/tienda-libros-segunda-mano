<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Models\Book;

class InventarioController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**** Mostrar inventario completo******/
    public function index()
    {
        $inventario = Inventario::with('libro')->get();
        return view('inventario.index', compact('inventario'));
    }

    /**** Formulario para editar un libro del inventario *****/
    public function editar($id)
    {
        $item = Inventario::with('libro')->findOrFail($id);
        return view('inventario.editar', compact('item'));
    }

    /**** Guardar cambios en inventario *****/
    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'estado' => 'required|string'
        ]);

        $item = Inventario::findOrFail($id);

        $item->stock = $request->stock;
        $item->precio_venta = $request->precio_venta;
        $item->estado = $request->estado;

        $item->save();

        return redirect()->route('inventario.index')
                         ->with('success', 'Inventario actualizado correctamente.');
    }
}
