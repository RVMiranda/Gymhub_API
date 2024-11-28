<?php

namespace App\Http\Controllers;

use App\Models\EntrenadorCliente;
use Illuminate\Http\Request;

class EntrenadorClienteController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => EntrenadorCliente::all()]);
    }
}
