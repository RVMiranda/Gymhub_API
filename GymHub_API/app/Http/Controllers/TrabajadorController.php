<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class TrabajadorController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => Trabajador::all()]);
    }

    public function show($id)
    {
        // Buscar el trabajador por su ID
        $trabajador = Trabajador::find($id);

        // Validar si se encuentra el trabajador
        if (!$trabajador) {
            return response()->json(['status' => 'error', 'message' => 'Trabajador no encontrado'], 404);
        }

        // Devolver la información del trabajador encontrado
        return response()->json(['status' => 'ok', 'data' => $trabajador], 200);
    }


    
}
