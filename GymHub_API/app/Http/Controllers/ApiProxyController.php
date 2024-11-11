<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiProxyController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $response = Http::post(env('API_BASE_URL') . '/api/gym-owner/login', [
            'client_id' => $validated['client_id'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return response()->json($response->json(), $response->status());
    }

    public function loginTrabajador(Request $request)
    {
        $validated = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);
    
        try {
            $response = Http::post(env('API_BASE_URL') . '/api/acceso-trabajador/login', [
                'usuario' => $validated['usuario'],
                'password' => $validated['password'],
            ]);
    
            if ($response->successful()) {
                // Enviar directamente la respuesta de la API externa al cliente
                return response()->json($response->json(), 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Credenciales incorrectas'
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al conectar con el servicio de autenticación: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
}
