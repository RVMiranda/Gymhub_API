<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EntrenadorController extends Controller
{
    //
    public function dashboard()
    {
        return view('entrenador.dashboard');
    }

    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => Entrenador::all()]);
    }

    public function show($id)
    {
        // Buscar la clase por su ID
        $clase = Entrenador::find($id);

        // Validar si se encuentra la clase
        if (!$clase) {
            return response()->json(['status' => 'error', 'message' => 'Clase no encontrada'], 404);
        }

        // Devolver la información de la clase encontrada
        return response()->json(['status' => 'ok', 'data' => $clase], 200);
    }

    public function getAllEntrenadores()
    {
        try {
            // Obtener todos los entrenadores junto con la información del trabajador
            $entrenadores = Entrenador::with('trabajador')->get();

            // Formatear los datos para enviarlos a la vista
            $data = $entrenadores->map(function ($entrenador) {
                return [
                    'id' => $entrenador->id,
                    'nombre' => $entrenador->trabajador->nombre,
                    'apellido_p' => $entrenador->trabajador->apellido_p,
                    'apellido_m' => $entrenador->trabajador->apellido_m,
                ];
            });

            // Retornar la respuesta en formato JSON
            return response()->json([
                'status' => 'ok',
                'data' => $data,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hubo un error al obtener los entrenadores',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function obtenerEntrenadoresConClientesYClases()
    {
        try {
            $entrenadores = Entrenador::with([
                'trabajador:id,nombre,apellido_p,apellido_m',
                'clasesConClientes.clase:id,nombre,descripcion,hora',
                'clasesConClientes.entrenadorCliente.cliente:id,nombre,apellido_p'
            ])->get();
    
            $resultado = $entrenadores->map(function ($entrenador) {
                return [
                    'nombre' => $entrenador->trabajador->nombre,
                    'apellido_p' => $entrenador->trabajador->apellido_p,
                    'apellido_m' => $entrenador->trabajador->apellido_m,
                    'clientes' => $entrenador->clasesConClientes->map(function ($claseConCliente) {
                        $hora = Carbon::parse($claseConCliente->clase->hora)->format('h:i a'); // Convertir la hora a un objeto Carbon y formatear
                        return [
                            'nombre' => $claseConCliente->entrenadorCliente->cliente->nombre . ' ' . $claseConCliente->entrenadorCliente->cliente->apellido_p,
                            'entrenamiento' => $claseConCliente->clase->nombre,
                            'hora' => $hora
                        ];
                    })
                ];
            });
    
            return response()->json(['status' => 'ok', 'data' => $resultado]);
    
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error al obtener la información', 'error' => $e->getMessage()], 500);
        }
    }
}
