<?php

namespace Database\Seeders;

use App\Models\ClaseConClientes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasesConClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ClasesConClientes = new ClaseConClientes();
        $ClasesConClientes->id_entrenador_cliente = 1;
        $ClasesConClientes->id_clase = 1;
        $ClasesConClientes->save();

        $ClasesConClientes = new ClaseConClientes();
        $ClasesConClientes->id_entrenador_cliente = 2;
        $ClasesConClientes->id_clase = 2;
        $ClasesConClientes->save();

    }
}
