<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function index() // metodo GET
    {
        return response()->json(['status' => 'ok', 'data' => Cliente::all()]);
    }

    public function nuevosClientesUltimosTresMeses()
    {
        try {
            $hoy = Carbon::now();
            $tresMesesAntes = $hoy->copy()->subMonths(3);

            $nuevosClientes = Cliente::whereBetween('created_at', [$tresMesesAntes, $hoy])
                ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->get();

            return response()->json([
                'status' => 'ok',
                'data' => $nuevosClientes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener los nuevos clientes',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}