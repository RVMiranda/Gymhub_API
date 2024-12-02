<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => Pago::all()]);
    }

    public function obtenerGananciasMes()
{
    try {
        // Obtener el año y el mes actuales
        $anioActual = Carbon::now()->year;
        $mesActual = Carbon::now()->month;

        // Calcular las ganancias por mes en los últimos 3 meses
        $ganancias = Pago::select(
                DB::raw('YEAR(fecha_pago) as year, MONTH(fecha_pago) as month, SUM(cantidad) as total_ganancia')
            )
            ->whereBetween('fecha_pago', [
                Carbon::now()->subMonths(2)->startOfMonth(), // Desde hace dos meses
                Carbon::now()->endOfMonth() // Hasta el final del mes actual
            ])
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->get();

        return response()->json([
            'status' => 'ok',
            'data' => $ganancias
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Hubo un error al obtener las ganancias mensuales',
            'error' => $e->getMessage()
        ], 500);
    }
}
}
