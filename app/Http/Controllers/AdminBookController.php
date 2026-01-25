<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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
        Book::create($request->all());
        return redirect()->route('admin.libros.index');
    }

    public function edit(Book $libro)
    {
        return view('admin.libros.edit', compact('libro'));
    }

    public function update(Request $request, Book $libro)
    {
        $libro->update($request->all());
        return redirect()->route('admin.libros.index');
    }

    public function destroy(Book $libro)
    {
        $libro->delete();
        return redirect()->route('admin.libros.index');
    }

    public function inventario()
    {
        return view('admin.inventario');
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
