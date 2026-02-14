<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBookController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /******* Muestra el listado completo de libros en el panel de administración ********/
    public function index()
    {
        $libros = Book::all();
        return view('admin.libros.index', compact('libros'));
    }
    /******* Muestra el formulario para crear un nuevo libro ********/
    public function create()
    {
        return view('admin.libros.create');
    }
    /****** Guarda un nuevo libro en la base de datos. 
     Valida los datos, crea el libro y lo asocia al usuario autenticado. *****/
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

        $book->inventario()->create([
            'stock' => $request->cantidad,
            'precio_venta' => $request->precio
        ]);

        return redirect()->route('admin.libros.index')->with('success', 'Libro añadido correctamente');
    }
    /****** Muestra el formulario para editar un libro existente******/
    public function edit(Book $libro)
    {
        return view('admin.libros.edit', compact('libro'));
    }
    /****** Actualiza los datos de un libro en la base de datos******/
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
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.libros.index')->with('success', 'Libro actualizado correctamente');
    }
    /******* Elimina un libro de la base de datos ******/
    public function destroy(Book $libro)
    {
        $libro->delete();
        return redirect()->route('admin.libros.index');
    }
    /***** Muestra la vista donde el administrador puede seleccionar un libro para eliminarlo ******/
    public function vistaEliminar()
    {
        $libros = Book::all();
        return view('admin.libros.delete', compact('libros'));
    }
    /***** Muestra la vista donde el administrador puede seleccionar un libro para actualizarlo ******/
    public function vistaActualizar()
    {
        $libros = Book::all();
        return view('admin.libros.actualizar', compact('libros'));
    }
    /******* Muestra el inventario completo de libros ********/
    public function inventario()
    {
        $libros = Book::with('inventario')->get();
        return view('admin.inventario', compact('libros'));
    }
    /******** Muestra el formulario para editar el stock de un libro concreto *******/
    public function editarStock(Book $libro)
    {
        // Crear inventario si no existe 
        $inventario = $libro->inventario()->firstOrCreate(
            ['book_id' => $libro->id],
            ['stock' => 0],
            ['precio_venta' => $libro->precio]

        );
        return view('admin.stock', compact('libro', 'inventario'));
    }
    /******** Actualiza el stock de un libro en el inventario *******/
    public function actualizarStock(Request $request, Book $libro)
    {
        $request->validate([
            'stock' => 'required|integer|min:0'
        ]);

        $inventario = $libro->inventario()->firstOrCreate(
            ['book_id' => $libro->id],
            ['stock' => 0]
        );
        $inventario->update([
            'stock' => $request->stock
        ]);

        return redirect()->route('admin.inventario')->with('success', 'Stock actualizado correctamente');
    }
    /********* Busca libros por título, autor o ISBN dentro del panel de administración **********/
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
