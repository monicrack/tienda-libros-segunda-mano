<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*Solicitudes de venta enviadas por los usuarios que desean vender libros a la tienda. */

class SellRequest extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'lista',
        'fotos',
    ];

    protected $casts = [
        'fotos' => 'array',
    ];
}
