<?php

namespace Database\Seeders;

use App\Models\ClienteTrabajador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteTrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cliente = new ClienteTrabajador();
        $cliente->id_trabajador = 2;
        $cliente->id_cliente = 2;
        $cliente->save();

        $cliente = new ClienteTrabajador();
        $cliente->id_trabajador = 2;
        $cliente->id_cliente = 3;
        $cliente->save();
    }
}
