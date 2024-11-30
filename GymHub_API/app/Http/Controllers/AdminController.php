<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('administrador.dashboard');
    }

    public function entrenador()
    {
        return view('administrador.entrenador');
    }
}
