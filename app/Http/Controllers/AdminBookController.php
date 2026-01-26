<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminBookController extends Controller
{
    public function index()
    {
        $libros = Book::all();
        return view('admin.libros.index', compact('libros'));
    }

    public function create()
    {
        return view('admin.libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
        ]);

        $book = new Book();
        $book->titulo = $request->titulo;
        $book->autor = $request->autor;
        $book->editorial = $request->editorial;
        $book->precio = $request->precio;
        $book->estado = $request->estado;
        $book->descripcion = $request->descripcion;
        $book->imagen = $request->imagen;
        $book->isbn = $request->isbn;
        $book->genero = $request->genero;
        $book->user_id = Auth::id();

        $book->save();

        return redirect()->route('admin.libros.index')->with('success', 'Libro añadido correctamente');
    }


    public function edit(Book $libro)
    {
        return view('admin.libros.edit', compact('libro'));
    }

    public function update(Request $request, Book $libro)
    {
        $libro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'editorial' => $request->editorial,
            'precio' => $request->precio,
            'estado' => $request->estado,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'isbn' => $request->isbn,
            'genero' => $request->genero,
            'user_id' => Auth::id(), // si quieres registrar quién lo editó
        ]);

        return redirect()->route('admin.libros.index')->with('success', 'Libro actualizado correctamente');
    }


    public function destroy(Book $libro)
    {
        $libro->delete();
        return redirect()->route('admin.libros.index');
    }
    public function vistaEliminar()
    {
        $libros = Book::all();
        return view('admin.libros.delete', compact('libros'));
    }

    public function vistaActualizar()
    {
        $libros = Book::all();
        return view('admin.libros.actualizar', compact('libros'));
    }

    public function inventario()
    {
        $libros = Book::with('inventario')->get();
        return view('admin.inventario', compact('libros'));
    }

    public function editarStock(Book $libro)
    {
        $inventario = $libro->inventario;
        return view('admin.stock', compact('libro', 'inventario'));
    }
    public function actualizarStock(Request $request, Book $libro)
    {
        $request->validate([
            'stock' => 'required|integer|min:0'
        ]);

        $libro->inventario->update([
            'stock' => $request->stock
        ]);

        return redirect()->route('admin.inventario')->with('success', 'Stock actualizado correctamente');
    }



    public function search(Request $request)
    {
        $query = $request->input('q');

        $books = Book::where('titulo', 'LIKE', "%{$query}%")
            ->orWhere('autor', 'LIKE', "%{$query}%")
            ->orWhere('isbn', 'LIKE', "%{$query}%")
            ->get();

        return view('admin.libros.search', compact('books', 'query'));
    }
}
