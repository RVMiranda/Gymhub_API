<?php

namespace App\Http\Controllers;

use App\Models\RegistroAsistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistroAsistenciasController extends Controller
{
    //
    public function registrarAsistenciaCliente(Request $request)
    {
        // Validar la matrícula
        $request->validate([
            'matricula' => 'required|string',
        ]);

        $matricula = $request->input('matricula');

        try {
            // Realizar la solicitud GET a la API para obtener todos los clientes
            $response = Http::get(env('API_BASE_URL') . '/api/cliente/get/all');

            if ($response->ok()) {
                $clientes = $response->json()['data'];

                // Buscar el cliente con la matrícula proporcionada
                $cliente = collect($clientes)->firstWhere('matricula', $matricula);

                if ($cliente) {
                    // Realizar el registro de asistencia
                    $registro = new RegistroAsistencia();
                    $registro->id_cliente = $cliente['id'];
                    $registro->fecha_entrada = now(); // Usar fecha y hora actuales
                    $registro->save();

                    return response()->json([
                        'status' => 'ok',
                        'message' => 'Asistencia registrada exitosamente',
                        'data' => $registro
                    ], 201);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Cliente no encontrado con la matrícula proporcionada'
                    ], 404);
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error al obtener los datos de los clientes'
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hubo un error al procesar la solicitud',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
