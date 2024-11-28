<?php

namespace Database\Seeders;

use App\Models\EntrenadorCliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrenadorClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $EntrenadorCliente = new EntrenadorCliente();
        $EntrenadorCliente->id_cliente = 2;
        $EntrenadorCliente->id_entrenador = 2;
        $EntrenadorCliente->save();

        $EntrenadorCliente = new EntrenadorCliente();
        $EntrenadorCliente->id_cliente = 3;
        $EntrenadorCliente->id_entrenador = 1;
        $EntrenadorCliente->save();
    }
}
