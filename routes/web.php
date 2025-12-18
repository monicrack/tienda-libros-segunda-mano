<?php
use Illuminate\Support\Facades\Route;
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
    Route::get('/terror', [BookController::class, 'categoria'])->name('libros.terror');
    Route::get('/novela', [BookController::class, 'categoria'])->name('libros.novela');
    Route::get('/infantil', [BookController::class, 'categoria'])->name('libros.infantil');
    Route::get('/ciencia-ficcion', [BookController::class, 'categoria'])->name('libros.cienciaficcion');
    Route::get('/fantasia', [BookController::class, 'categoria'])->name('libros.fantasia');
});
