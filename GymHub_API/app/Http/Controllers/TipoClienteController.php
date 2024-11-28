<?php

namespace App\Http\Controllers;

use App\Models\tipoCliente;
use Illuminate\Http\Request;

class TipoClienteController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => tipoCliente::all()]);
    }
}
