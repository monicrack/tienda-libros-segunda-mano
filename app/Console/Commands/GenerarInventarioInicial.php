<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use App\Models\Inventario;

class GenerarInventarioInicial extends Command
{
    protected $signature = 'inventario:inicial {stock=5}';
    protected $description = 'Genera un inventario inicial para todos los libros';
    /*Genera un inventario inicial para todos los libros con un stock predeterminado a 5 unidades.
      Si el inventario ya existe para un libro, no lo sobrescribe
      Ejecución: php artisan inventario:inicial {stock} para cambiar el valor por defecto*/
    public function handle()
    {
        $stockInicial = (int) $this->argument('stock');

        $books = Book::all();

        foreach ($books as $book) {
            Inventario::firstOrCreate(
                ['book_id' => $book->id],
                [
                    'stock' => $stockInicial,
                    'precio_venta' => $book->precio,
                    'estado' => 'nuevo'
                ]
            );
        }

        $this->info("Inventario inicial generado con stock = {$stockInicial}");
    }
}
