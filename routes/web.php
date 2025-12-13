<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/libros', function () {
    return view('books.index');
});
use App\Http\Controllers\BookController;

Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
