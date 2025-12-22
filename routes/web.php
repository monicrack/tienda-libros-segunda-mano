<?php
/*****Definir las URLs que los usuarios pueden visitar ******/
/**
 * --------------------------------------------------------------
 *  Rutas: Home, Gestión de libros, Formularios, 
 * y Páginas de Información y Legales
 * --------------------------------------------------------------
 */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/******** Página principal **************/
Route::get('/', function () {
    return view('home');
});

/********* Libros: listado, búsqueda, venta, detalle, novedades ********/

// Listado general de libros
Route::get('/libros', [BookController::class, 'index'])->name('books.index');

// Buscador de libros
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

// Detalle de un libro concreto
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Página de novedades
Route::get('/novedades', [BookController::class, 'novedades'])->name('books.novedades');

/************* Importación desde API externa (Google Books)*********/
Route::get('/importar-libros/{busqueda}', [BookController::class, 'importarDesdeApi'])
    ->name('books.importar');
Route::get('/probar-importacion/{busqueda}', [App\Http\Controllers\BookController::class, 'importarDesdeApi']);

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

/*********** Información compramos libros ************/
Route::get('/compramos-tus-libros', [SellController::class, 'index'])->name('sell');
Route::post('/compramos-tus-libros/enviar', [SellController::class, 'submit'])->name('sell.submit');

/***** Página de contacto *******/
Route::get('/contacto', [ContactController::class, 'index'])->name('contact');
Route::post('/contacto/enviar', [ContactController::class, 'submit'])->name('contact.submit');

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

Route::view('/privacidad', 'legal.proteccion')->name('privacidad');

/********** Información **********/
Route::get('/atencion-cliente', function () {
    return view('informacion.atencion');
})->name('info.atencion');

Route::get('/envios-devoluciones', function () {
    return view('informacion.envios-devoluciones');
})->name('info.envios');

Route::get('/gastos-envio', function () {
    return view('informacion.gastos-envio');
})->name('info.gastos');

Route::get('/quienes-somos', function () {
    return view('informacion.quienes-somos');
})->name('info.quienes');

/************* Registro *************/
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
/****************************************
 * Rutas de autenticación (login, logout)
 ****************************************/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); Route::post('/login', [LoginController::class, 'login']); Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





