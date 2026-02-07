<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /******** Muestra el panel principal del administrador *******/
    public function index()
    {
        return view('admin.dashboard');
    }
}
