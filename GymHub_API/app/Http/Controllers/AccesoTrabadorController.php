<?php

namespace App\Http\Controllers;

use App\Models\AccesoTrabajador;
use Illuminate\Http\Request;

class AccesoTrabadorController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => AccesoTrabajador::all()]);
    }
}
