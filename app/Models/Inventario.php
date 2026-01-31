<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*Representa el inventario de libros disponibles en la tienda. */

class Inventario extends Model
{
    protected $table = 'inventario';

    protected $fillable = [
        'book_id',
        'stock',
        'precio_venta',
        'estado'
    ];
    /*Relación con el modelo Book. */
    public function libro()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
