<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

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

        return view('books.index', compact('books'));
    
    }
    public function importarDesdeApi($busqueda)
    {
        $response = Http::get(
            'https://www.googleapis.com/books/v1/volumes',
            [
                'q' => $busqueda,
                'maxResults' => 20
            ]
        );

        $items = $response->json()['items'] ?? [];

        foreach ($items as $item) {

            $info = $item['volumeInfo'];

            Book::firstOrCreate(
                [
                    'titulo' => $info['title'] ?? 'Sin título',
                ],
                [
                    'autor' => $info['authors'][0] ?? 'Autor desconocido',
                    'editorial' => $info['publisher'] ?? 'Editorial desconocida',
                    'descripcion' => $info['description'] ?? 'Sin descripción',
                    'imagen' => $info['imageLinks']['thumbnail'] ?? null,
                    'precio' => rand(5, 30),
                    'estado' => 'usado',
                    'user_id' => Auth::id() 
                ]
            );
        }

        return redirect()->back()->with('success', 'Libros importados correctamente');
    }
    public function categoria(Request $request)
{
    $genero = $request->segment(2); // obtiene 'terror', 'novela', etc.
    $books = Book::where('genero', $genero)->get();

    return view('libros.categoria', compact('books', 'genero'));
}

    
}
