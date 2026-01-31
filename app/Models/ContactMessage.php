<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/*Mensajes de contacto enviados por los usuarios a través del formulario de contacto. */

class ContactMessage extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'mensaje',
    ];
}
