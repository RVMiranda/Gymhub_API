<?php

namespace App\Http\Controllers;

use App\Models\TiposEjercicio;
use Illuminate\Http\Request;

class TipoEjercicioController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => TiposEjercicio::all()]);
    }
}
