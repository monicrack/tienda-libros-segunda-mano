<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/*Representa a los usuarios de la aplicación, incluyendo clientes y administradores. */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',   
            
    ];
    /*Atributos que deben ocultarse en las representaciones del modelo*/
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /*Atributos que deben convertirse a tipos nativos de PHP */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }
}
