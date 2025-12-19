<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/******** Página principal **************/
Route::get('/', function () {
    return view('home');
});

/********* Libros: listado, búsqueda, venta, detalle, novedades ********/

// Listado general de libros
Route::get('/libros', [BookController::class, 'index'])->name('books.index');

// Buscador de libros
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

// Página para vender libros
Route::get('/vender-libros', [BookController::class, 'sell'])->name('books.sell');

// Detalle de un libro concreto
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Página de novedades
Route::get('/novedades', [BookController::class, 'novedades'])->name('books.novedades');

/************* Importación desde API externa (Google Books)*********/
Route::get('/importar-libros/{busqueda}', [BookController::class, 'importarDesdeApi'])
    ->name('books.importar');

/********** Categorías de libros***********************************************
*********Todas las rutas que empiezan por /libros/... se agrupan aquí.*********
*********Cada una llama al método categoria() del controlador.*****************/
Route::prefix('libros')->group(function () {
    Route::get('/terror', [BookController::class, 'categoria'])->name('libros.terror');
    Route::get('/novela', [BookController::class, 'categoria'])->name('libros.novela');
    Route::get('/infantil', [BookController::class, 'categoria'])->name('libros.infantil');
    Route::get('/ciencia-ficcion', [BookController::class, 'categoria'])->name('libros.cienciaficcion');
    Route::get('/fantasia', [BookController::class, 'categoria'])->name('libros.fantasia');
});

/******* Contacto*******/
Route::get('/contacto', function () {
    return view('contact');
})->name('contact');

/********** Páginas legales**********/
Route::get('/aviso-legal', function () {
    return view('legal.aviso');
})->name('legal.aviso');

Route::get('/politica-cookies', function () {
    return view('legal.cookies');
})->name('legal.cookies');

Route::get('/condiciones-venta', function () {
    return view('legal.condiciones');
})->name('legal.condiciones');

Route::get('/proteccion-datos', function () {
    return view('legal.proteccion');
})->name('legal.proteccion');

/********** Información **********/
Route::get('/atencion-cliente', function () {
    return view('informacion.atencion');
})->name('info.atencion');

Route::get('/envios-devoluciones', function () {
    return view('informacion.envios-devoluciones');
})->name('info.envios');

