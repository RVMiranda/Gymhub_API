<?php

namespace App\Http\Controllers;

use App\Models\GymOwner;
use Illuminate\Http\Request;

class GymOwnerController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => GymOwner::all()]);
    }

}
