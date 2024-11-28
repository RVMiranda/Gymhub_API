<?php

namespace App\Http\Controllers;

use App\Models\EntrenadorAgenda;
use Illuminate\Http\Request;

class EntrenadorAgendaController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => EntrenadorAgenda::all()]);
    }
}
