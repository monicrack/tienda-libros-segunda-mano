<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/*Campos que pueden rellenarse masivamente */
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'editorial',
        'precio',
        'estado',
        'descripcion',
        'imagen',
        'user_id',
        'genero',
        'isbn'
    ];

    /*Relación con el usuario que publicó el libro */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /*Relación con la tabla de inventario */
    public function inventario()
    {
        return $this->hasOne(Inventario::class, 'book_id');
    }
}
