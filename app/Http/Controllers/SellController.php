<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SellRequest;

class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }

   public function submit(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'email' => 'required|email',
        'lista' => 'required',
        'fotos.*' => 'image|max:2048'
    ]);

    // Guardar fotos si existen
    $fotosGuardadas = [];

    if ($request->hasFile('fotos')) {
        foreach ($request->file('fotos') as $foto) {
            $nombre = $foto->store('fotos_libros', 'public');
            $fotosGuardadas[] = $nombre;
        }
    }

    // Guardar en la base de datos
    SellRequest::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'lista' => $request->lista,
        'fotos' => $fotosGuardadas,
    ]);

    return back()->with('success_sell', 'Tu solicitud de venta ha sido enviada. Te contactaremos pronto.');
}
}
