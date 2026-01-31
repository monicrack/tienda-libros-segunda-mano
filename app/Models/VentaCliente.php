<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*Registra las ventas realizadas a los clientes, incluyendo detalles del comprador y del libro vendido*/

class VentaCliente extends Model
{
    protected $table = 'ventas_clientes';

    protected $fillable = [
        'comprador_id',
        'book_id',
        'cantidad',
        'precio_venta'
    ];
    /*Relación con el modelo User (comprador). */
    public function comprador()
    {
        return $this->belongsTo(User::class, 'comprador_id');
    }
    /*Relación con el modelo Book. */
    public function libro()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    
}
