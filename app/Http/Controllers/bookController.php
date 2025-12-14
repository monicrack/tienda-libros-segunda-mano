<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
        
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $books = Book::where('titulo', 'like', "%{$query}%")
            ->orWhere('autor', 'like', "%{$query}%")
            ->get();

        return view('books.index', compact('books'));
    }

    public function sell()
    {
        return view('books.sell');
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
    public function novedades()
    {
        // Obtener los últimos 10 libros ordenados por fecha de creación
        $books = Book::orderBy('created_at', 'desc')->take(10)->get();

        return view('books.novedades', compact('books'));
    }
   

}
