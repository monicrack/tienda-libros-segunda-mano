<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*Representa las compras que la tienda realiza a los vendedores, almacenando
información sobre el vendedor, el libro adquirido, la cantidad y el precio pagado. */

class CompraVendedor extends Model
{
    protected $table = 'compras_vendedores';

    protected $fillable = [
        'vendedor_id',
        'book_id',
        'cantidad',
        'precio_pagado'
    ];
    /*Relación con el modelo User (vendedor) */
    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
    /*Relación con el modelo Book (libro) */
    public function libro()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
