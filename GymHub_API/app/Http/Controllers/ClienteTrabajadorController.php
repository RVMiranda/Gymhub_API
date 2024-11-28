<?php

namespace App\Http\Controllers;

use App\Models\ClienteTrabajador;
use Illuminate\Http\Request;

class ClienteTrabajadorController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => ClienteTrabajador::all()]);
    }
}
