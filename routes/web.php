<?php

/* Archivo principal de rutas web.
   Contiene todas las rutas públicas y privadas de la aplicación,
   organizadas por secciones: libros, categorías, carrito, usuarios
   y panel de administración */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Tienda\CarritoController;
use App\Http\Controllers\Tienda\CompraVendedorController;
use App\Http\Controllers\Tienda\VentaClienteController;
use App\Http\Controllers\Tienda\InventarioController;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\UserSessionController;

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
    Route::get('/todos', [BookController::class, 'categoria'])->name('libros.todos');
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

/****Aceptar Cookies********/
Route::post('/aceptar-cookies', function () {
    Cookie::queue('cookies_aceptadas_relibromania', true, 60 * 24 * 365); // 1 año
    return back();
})->name('cookies.aceptar');

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

/*********** Rutas de autenticación (login, logout) **************/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*********** Rutas del carrito de la compra **************/

Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
Route::post('/finalizar-compra', [CarritoController::class, 'finalizarCompra'])
    ->middleware('auth')
    ->name('carrito.finalizar');

/*********** Compras a vendedores **************/
Route::post('/comprar-vendedor', [CompraVendedorController::class, 'comprarAlVendedor'])
->middleware('auth')
->name('comprar.vendedor');
Route::get('/mis-compras-vendedor', [CompraVendedorController::class, 'misComprasVendedor'])
    ->middleware('auth')
    ->name('compras.vendedor');

/*********** Ventas a clientes **************/
Route::post('/vender-cliente', [VentaClienteController::class, 'venderAlCliente'])->name('vender.cliente');
Route::get('/mis-compras', [VentaClienteController::class, 'misComprasCliente'])
    ->middleware('auth')
    ->name('compras.cliente');


/*********** Inventario de la tienda **************/
Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');
Route::get('/inventario/editar/{id}', [InventarioController::class, 'editar'])->name('inventario.editar');
Route::post('/inventario/actualizar/{id}', [InventarioController::class, 'actualizar'])->name('inventario.actualizar');


/***********  Formulario Comprar libros a vendedores **************/
Route::get('/vender', [CompraVendedorController::class, 'formularioVender'])
    ->name('ventas.form');
Route::post('/vender/guardar', [CompraVendedorController::class, 'comprarAlVendedor'])
    ->name('ventas.guardar');
/************Ruta para control de sesiones*************/
Route::post('/logout', [UserSessionController::class, 'logout'])->name('logout');


/********** Rutas de administración (solo para admins) **************/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard del administrador
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        // CRUD de libros 
        Route::get('/libros/eliminar', [AdminBookController::class, 'vistaEliminar'])
            ->name('libros.delete');
        Route::get('/libros/actualizar', [AdminBookController::class, 'vistaActualizar'])
            ->name('libros.actualizar');
        Route::get('/buscar-google', [BookController::class, 'buscarGoogle']);


        Route::resource('libros', AdminBookController::class);
        // Inventario 
        Route::get('/inventario', [AdminBookController::class, 'inventario'])
            ->name('inventario');
        Route::get('/buscar', [AdminBookController::class, 'search'])
            ->name('libros.search');
        Route::get('/inventario/{libro}/stock', [AdminBookController::class, 'editarStock'])
            ->name('inventario.stock.edit');

        Route::put('/inventario/{libro}/stock', [AdminBookController::class, 'actualizarStock'])
            ->name('inventario.stock.update');
        Route::get('/admin/sesiones', [App\Http\Controllers\AdminSessionController::class, 'index'])
        ->name('sesiones');
    });
