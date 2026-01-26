<?php

/*** Modelo: Book
 * Representa un libro dentro del sistema.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function inventario()
    {
        return $this->hasOne(Inventario::class, 'book_id');
    }
}
