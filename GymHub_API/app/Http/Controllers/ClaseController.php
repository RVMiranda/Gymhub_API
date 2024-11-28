<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => Clase::all()]);
    }

    public function show($id)
    {
        // Buscar la clase por su ID
        $clase = Clase::find($id);

        // Validar si se encuentra la clase
        if (!$clase) {
            return response()->json(['status' => 'error', 'message' => 'Clase no encontrada'], 404);
        }

        // Devolver la información de la clase encontrada
        return response()->json(['status' => 'ok', 'data' => $clase], 200);
    }
}
