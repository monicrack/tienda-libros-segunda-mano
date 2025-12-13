<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        $books = Book::where('titulo', 'like', "%{$query}%")
                     ->orWhere('autor', 'like', "%{$query}%")
                     ->get();

        return view('books.index', compact('books'));
    }
}
