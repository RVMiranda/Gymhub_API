<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class HorariosController extends Controller
{
    //
    public function horarios()
    {
        try {
            // Solicitar todas las clases grupales
            $responseClasesGrupales = Http::get(env('API_BASE_URL') . '/api/clases-grupales/get/all');

            if (!$responseClasesGrupales->ok()) {
                return response()->json(['status' => 'error', 'message' => 'Error al obtener las clases grupales'], 500);
            }

            $clasesGrupales = $responseClasesGrupales->json()['data'];
            $horarios = [];

            foreach ($clasesGrupales as $claseGrupal) {
                // Obtener información de la clase usando el id_clase correctamente
                $responseClase = Http::get(env('API_BASE_URL') . "/api/clase/get/{$claseGrupal['id_clase']}");
                if (!$responseClase->ok()) {
                    return response()->json(['status' => 'error', 'message' => 'Error al obtener la información de la clase'], 500);
                }
                $clase = $responseClase->json()['data'];

                // Obtener información del entrenador (referenciado como trabajador)
                $responseEntrenador = Http::get(env('API_BASE_URL') . "/api/entrenador/get/{$claseGrupal['id_entrenador']}");
                if (!$responseEntrenador->ok()) {
                    return response()->json(['status' => 'error', 'message' => 'Error al obtener la información del entrenador'], 500);
                }
                $entrenador = $responseEntrenador->json()['data'];

                // Obtener información del trabajador correspondiente al entrenador
                $responseTrabajador = Http::get(env('API_BASE_URL') . "/api/trabajador/get/{$entrenador['id_trabajador']}");
                if (!$responseTrabajador->ok()) {
                    return response()->json(['status' => 'error', 'message' => 'Error al obtener la información del trabajador'], 500);
                }
                $trabajador = $responseTrabajador->json()['data'];

                // Añadir al listado de horarios con la información relevante
                $horarios[] = [
                    'nombre_clase' => $clase['nombre'],
                    'hora' => Carbon::parse($clase['hora'])->format('g:i a'), // Utilizar la hora de la clase
                    'dia' => $claseGrupal['dia'], // Añadir el día de la clase
                    'entrenador' => $trabajador['nombre'] . ' ' . substr($trabajador['apellido_p'], 0, 1) . '.',
                ];
            }

            return response()->json(['status' => 'ok', 'data' => $horarios]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hubo un error al procesar la solicitud',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
