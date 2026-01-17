<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VentaCliente extends Model
{
    protected $table = 'ventas_clientes';

    protected $fillable = [
        'comprador_id',
        'book_id',
        'cantidad',
        'precio_venta'
    ];

    public function comprador()
    {
        return $this->belongsTo(User::class, 'comprador_id');
    }

    public function libro()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    
}
