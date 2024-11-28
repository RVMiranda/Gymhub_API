<?php

namespace App\Http\Controllers;

use App\Models\ClasesGrupales;
use Illuminate\Http\Request;

class ClasesGrupalesController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => ClasesGrupales::all()]);
    }
}
