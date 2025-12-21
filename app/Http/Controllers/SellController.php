<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        \Log::info('Solicitud de venta:', $request->all());

        return back()->with('success_sell', 'Tu solicitud de venta ha sido enviada. Te contactaremos pronto.');
    }
}
