<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => Contrato::all()]);
    }

    public function obtenerClientesActivosUltimosMeses() {
        try {
            // Obtener la fecha actual y los últimos tres meses
            $hoy = Carbon::now();
            $fechaTresMesesAtras = $hoy->copy()->subMonths(2)->startOfMonth();
    
            $clientesActivos = Contrato::where('estado', 1)
                ->whereDate('fecha_fin', '>=', $fechaTresMesesAtras)
                ->get()
                ->groupBy(function($contrato) {
                    return Carbon::parse($contrato->fecha_inicio)->format('Y-m');
                })
                ->map(function($mes) {
                    return count($mes);
                });
    
            return response()->json([
                'status' => 'ok',
                'data' => $clientesActivos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener los clientes activos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function obtenerCancelacionesMes()
    {
        try {
            // Obtener el mes actual
            $mesActual = Carbon::now()->month;
            $anioActual = Carbon::now()->year;

            // Contar las cancelaciones (estado que ha cambiado a 0 en el mes actual)
            $cancelaciones = Contrato::where('estado', 0)
                ->whereYear('updated_at', $anioActual)
                ->whereMonth('updated_at', $mesActual)
                ->count();

            return response()->json([
                'status' => 'ok',
                'data' => [
                    'cancelaciones' => $cancelaciones,
                    'year' => $anioActual,
                    'month' => $mesActual
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hubo un error al obtener las cancelaciones',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function obtenerRenovacionesMes()
    {
        try {
            // Obtener el año y el mes actuales
            $anioActual = Carbon::now()->year;
            $mesActual = Carbon::now()->month;

            // Contar renovaciones (nuevos contratos) por mes en los últimos 3 meses
            $renovaciones = Contrato::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total'))
                ->where('estado', 1) // Se consideran contratos activos
                ->whereBetween('created_at', [
                    Carbon::now()->subMonths(2)->startOfMonth(), // Desde hace dos meses
                    Carbon::now()->endOfMonth() // Hasta el final del mes actual
                ])
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->get();

            return response()->json([
                'status' => 'ok',
                'data' => $renovaciones
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hubo un error al obtener las renovaciones',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}
