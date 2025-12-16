<?php

use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('home');
});

Route::get('/libros', [BookController::class, 'index'])->name('books.index');
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::get('/vender-libros', [BookController::class, 'sell'])->name('books.sell');
Route::get('/contacto', function () {
    return view('contact');
})->name('contact');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/novedades', [BookController::class, 'novedades'])->name('books.novedades');

Route::get('/importar-libros/{busqueda}', [BookController::class, 'importarDesdeApi']);

Route::prefix('libros')->group(function () {
    Route::get('/terror', [LibroController::class, 'categoria'])->name('libros.terror');
    Route::get('/novela', [LibroController::class, 'categoria'])->name('libros.novela');
    Route::get('/infantil', [LibroController::class, 'categoria'])->name('libros.infantil');
    Route::get('/ciencia-ficcion', [LibroController::class, 'categoria'])->name('libros.cienciaficcion');
});
