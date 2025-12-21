<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

/********** Mostrar catálogo completo **********/
class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    /********** Buscar libro por título, autor o ISBN**********/
    public function search(Request $request)
    {
        $query = $request->input('q');

        $books = Book::where('titulo', 'like', "%{$query}%")
            ->orWhere('autor', 'like', "%{$query}%")
            ->orWhere('isbn', 'like', "%{$query}%")
            ->get();

        return view('books.categoria', compact('books'));
    }
   

    /********** Mostrar los detalles de un libro concreto **********/
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
    /********** Mostrar 12 libros destacados **********/
    public function novedades()
    {
        $ids = [238, 250, 170, 179, 184, 219, 201, 148, 203, 197, 155, 102];

        // Obtiene solo esos libros
        $books = Book::whereIn('id', $ids)->get();

        return view('books.novedades', compact('books'));
    }

    /********** Importar libros desde la API de Google Books **********/
    public function importarDesdeApi($busqueda)
    {
        // Llamada a la API de Google Books con la palabra buscada
        $response = Http::get(
            'https://www.googleapis.com/books/v1/volumes',
            [
                'q' => $busqueda,
                'maxResults' => 20
            ]
        );

        // Obtiene los resultados o un array vacío si no hay items
        $items = $response->json()['items'] ?? [];

        // Recorre cada libro devuelto por la API
        foreach ($items as $item) {

            $info = $item['volumeInfo'];

            /********** EXTRAER ISBN (si existe) **********/
            $isbn = null;

            if (!empty($info['industryIdentifiers'])) {
                foreach ($info['industryIdentifiers'] as $identifier) {

                    // Prioridad: ISBN_13
                    if ($identifier['type'] === 'ISBN_13') {
                        $isbn = $identifier['identifier'];
                        break;
                    }

                    // Si no hay ISBN_13, aceptar ISBN_10
                    if ($identifier['type'] === 'ISBN_10') {
                        $isbn = $identifier['identifier'];
                    }
                }
            }

            /********** CREAR EL LIBRO (aunque no tenga ISBN) **********/
            Book::create([
                'titulo' => $info['title'] ?? 'Sin título',
                'autor' => $info['authors'][0] ?? 'Autor desconocido',
                'editorial' => $info['publisher'] ?? 'Editorial desconocida',
                'descripcion' => $info['description'] ?? 'Sin descripción',
                'imagen' => $info['imageLinks']['thumbnail'] ?? null,
                'precio' => rand(5, 30),
                'estado' => 'usado',
                'user_id' => Auth::id(),
                'isbn' => $isbn, // Puede ser null

                // Normaliza el género para usarlo en URLs
                'genero' => strtolower(
                    str_replace(
                        [' ', 'í', 'á', 'é', 'ó', 'ú'],
                        ['-', 'i', 'a', 'e', 'o', 'u'],
                        $info['categories'][0] ?? $busqueda
                    )
                )
            ]);
        }

        // Mensaje de éxito
        return redirect()->back()->with('success', 'Libros importados correctamente');
    }


    /*********** Mostrar los libros filtrados por categoría (género)*********/
    public function categoria(Request $request)
    {
        $genero = $request->segment(2);

        $nombresBonitos = [
            'fantasia' => 'Fantasía',
            'ciencia-ficcion' => 'Ciencia Ficción',
            'novela' => 'Novela',
            'terror' => 'Terror',
            'infantil' => 'Infantil',
        ];

        $generoMostrar = $nombresBonitos[$genero] ?? ucfirst($genero);

        $books = Book::where('genero', $genero)->get();

        return view('books.categoria', compact('books', 'generoMostrar'));
    }

  
}
