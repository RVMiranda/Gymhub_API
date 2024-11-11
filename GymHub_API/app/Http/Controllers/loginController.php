<?php

namespace App\Http\Controllers;

use App\Models\AccesoTrabajador;
use App\Models\GymOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(){
        return view('logingym');
    }

    public function gymOwner(Request $request)
    {
        $request->validate([
            'client_id' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $gymOwner = GymOwner::where('client_id', $request->client_id)
                            ->where('email', $request->email)
                            ->first();
        if ($gymOwner && Hash::check($request->password, $gymOwner->password)) {
            return response()->json([
                'status' => 'success',
                'message' => 'Inicio de sesión exitoso',
                'data' => [
                    'id' => $gymOwner->id,
                    'client_name' => $gymOwner->client_name,
                    'client_lastname' => $gymOwner->client_lastname,
                    'gym_name' => $gymOwner->gym_name,
                    'client_id' => $gymOwner->client_id,
                    'email' => $gymOwner->email,
                ]
            ], 200);
        } else {    
            return response()->json([
                'status' => 'error',
                'message' => 'Credenciales incorrectas'
            ], 401);
        }
    }

    public function accesoTrabajador(Request $request)
{
    $request->validate([
        'usuario' => 'required|string',
        'password' => 'required|string',
    ]);

    $accesoTrabajador = AccesoTrabajador::where('usuario', $request->usuario)
                        ->first();
    if ($accesoTrabajador && Hash::check($request->password, $accesoTrabajador->password)) {
        return response()->json([
            'status' => 'success',
            'message' => 'Inicio de sesión exitoso',
            'data' => [
                'id' => $accesoTrabajador->id,
                'id_trabajador' => $accesoTrabajador->id_trabajador,
                'id_tipo_acceso' => $accesoTrabajador->id_tipo_acceso,
                'usuario' => $accesoTrabajador->usuario,
            ]
        ], 200);
    } else {    
        return response()->json([
            'status' => 'error',
            'message' => 'Credenciales incorrectas'
        ], 401);
    }
}

   
}
