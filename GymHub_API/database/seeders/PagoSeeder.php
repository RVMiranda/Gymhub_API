<?php

namespace Database\Seeders;

use App\Models\Pago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // pago del cliente 1
        $pago = new Pago();
        $pago->id_cliente = 1;
        $pago->cantidad = 400;
        $pago->fecha_pago = '2024-11-25';
        $pago->fecha_corte = '2024-11-20';
        $pago->fecha_vencimiento = '2024-11-27';
        $pago->adeudo = 0;
        $pago->save();

        // pago del cliente 2
        $pago = new Pago();
        $pago->id_cliente = 2;
        $pago->cantidad = 600;
        $pago->fecha_pago = '2024-11-25';
        $pago->fecha_corte = '2024-11-20';
        $pago->fecha_vencimiento = '2024-11-27';
        $pago->adeudo = 0;
        $pago->save();

        // pago del cliente 3
        $pago = new Pago();
        $pago->id_cliente = 3;
        $pago->cantidad = 600;
        $pago->fecha_pago = '2024-11-25';
        $pago->fecha_corte = '2024-11-20';
        $pago->fecha_vencimiento = '2024-11-27';
        $pago->adeudo = 0;
        $pago->save();

    }
}
