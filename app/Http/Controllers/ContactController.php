<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

public function submit(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'email' => 'required|email',
        'mensaje' => 'required',
    ]);

    ContactMessage::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'mensaje' => $request->mensaje,
    ]);

    return back()->with('success_contact', 'Tu mensaje ha sido enviado correctamente.');
}
}
