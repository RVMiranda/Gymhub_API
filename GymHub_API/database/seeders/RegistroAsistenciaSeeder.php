<?php

namespace Database\Seeders;

use App\Models\RegistroAsistencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistroAsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // registro de asistencia del cliente 1
        $RegistroAsistencia = new RegistroAsistencia();
        $RegistroAsistencia->id_cliente = 1;
        $RegistroAsistencia->fecha_entrada = '2024-11-20 14:30:00';
        $RegistroAsistencia->save();

        // registro de asistencia del cliente 2
        $RegistroAsistencia = new RegistroAsistencia();
        $RegistroAsistencia->id_cliente = 2;
        $RegistroAsistencia->fecha_entrada = '2024-11-20 14:30:00';
        $RegistroAsistencia->save();

        // registro de asistencia del cliente 3
        $RegistroAsistencia = new RegistroAsistencia();
        $RegistroAsistencia->id_cliente = 3;
        $RegistroAsistencia->fecha_entrada = '2024-11-20 14:30:00';
        $RegistroAsistencia->save();
        
    }
}
