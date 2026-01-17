<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraVendedor extends Model
{
    protected $table = 'compras_vendedores';

    protected $fillable = [
        'vendedor_id',
        'book_id',
        'cantidad',
        'precio_pagado'
    ];

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function libro()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
