<?php

namespace App\Http\Controllers;

use App\Models\EntrenadorTipoEjercicio;
use Illuminate\Http\Request;

class EntrenadorTipoEjercicioController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => EntrenadorTipoEjercicio::all()]);
    }
}
