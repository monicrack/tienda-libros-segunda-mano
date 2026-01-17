<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';

    protected $fillable = [
        'book_id',
        'stock',
        'precio_venta',
        'estado'
    ];

    public function libro()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
