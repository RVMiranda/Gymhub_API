<?php

namespace App\Http\Controllers;

use App\Models\ClaseConClientes;
use Illuminate\Http\Request;

class ClaseConClienteController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => ClaseConClientes::all()]);
    }
}
