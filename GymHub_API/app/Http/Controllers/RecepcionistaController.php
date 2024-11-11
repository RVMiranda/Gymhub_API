<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecepcionistaController extends Controller
{
    //
    public function dashboard()
    {
        return view('recepcionista.dashboard');
    }
}
