<?php

namespace Database\Seeders;

use App\Models\Contrato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //contato del cliente 1
        $Contrato = new Contrato();
        $Contrato->id_cliente = 1;
        $Contrato->fecha_inicio = '2024-10-20';
        $Contrato->fecha_fin = '2025-01-20';
        $Contrato->estado = 1;
        $Contrato->save();

        //contato del cliente 2
        $Contrato = new Contrato();
        $Contrato->id_cliente = 1;
        $Contrato->fecha_inicio = '2024-10-20';
        $Contrato->fecha_fin = '2025-01-20';
        $Contrato->estado = 1;
        $Contrato->save();

        //contato del cliente 3
        $Contrato = new Contrato();
        $Contrato->id_cliente = 1;
        $Contrato->fecha_inicio = '2024-10-20';
        $Contrato->fecha_fin = '2025-02-20';
        $Contrato->estado = 1;
        $Contrato->save();
    }
}
