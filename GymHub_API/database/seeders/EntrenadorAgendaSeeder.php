<?php

namespace Database\Seeders;

use App\Models\EntrenadorAgenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrenadorAgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $EntrenadorAgenda = new EntrenadorAgenda();
        $EntrenadorAgenda->id_entrenador_cliente = 1;
        $EntrenadorAgenda->fecha_hora = '2024-11-25 10:00:00';
        $EntrenadorAgenda->estado = true;

        $EntrenadorAgenda = new EntrenadorAgenda();
        $EntrenadorAgenda->id_entrenador_cliente = 2;
        $EntrenadorAgenda->fecha_hora = '2024-11-26 11:00:00';
        $EntrenadorAgenda->estado = true;
    }
}
