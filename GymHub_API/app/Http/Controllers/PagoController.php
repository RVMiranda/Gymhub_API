<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => Pago::all()]);
    }
}
