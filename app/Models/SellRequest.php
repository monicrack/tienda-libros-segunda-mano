<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
