<?php

namespace App\Http\Controllers;

use App\Models\RegistroAsistencia;
use Illuminate\Http\Request;

class ClienteAsistenciasController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => RegistroAsistencia::all()]);
    }
}
