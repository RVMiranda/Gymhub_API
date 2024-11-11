<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntrenadorController extends Controller
{
    //
    public function dashboard()
    {
        return view('entrenador.dashboard');
    }
}
