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


