<?php

namespace Database\Seeders;

use App\Models\Entrenador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrenadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //entrenador
        $Entrenador = new Entrenador();
        $Entrenador->id_trabajador = 2;
        $Entrenador->hora = '10:00:00';
        $Entrenador->save();

        $Entrenador = new Entrenador();
        $Entrenador->id_trabajador = 3;
        $Entrenador->hora = '11:00:00';
        $Entrenador->save();
    }
}
