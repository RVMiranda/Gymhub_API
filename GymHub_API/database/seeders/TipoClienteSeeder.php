<?php

namespace Database\Seeders;

use App\Models\tipoCliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TipoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cliente básico
        $TipoCliente = new tipoCliente();
        $TipoCliente->tipo = 'Plan básico';
        $TipoCliente->costo = 400;
        $TipoCliente->save();

        // Cliente VIP
        $TipoCliente = new tipoCliente();
        $TipoCliente->tipo = 'Plan VIP';
        $TipoCliente ->costo = 600;
        $TipoCliente ->save();

    }
}
