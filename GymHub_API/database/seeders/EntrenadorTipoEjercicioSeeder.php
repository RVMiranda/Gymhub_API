<?php

namespace Database\Seeders;

use App\Models\EntrenadorTipoEjercicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrenadorTipoEjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $EntrenadorTipoEjercicio = new EntrenadorTipoEjercicio();
        $EntrenadorTipoEjercicio->id_entrenador = 1;
        $EntrenadorTipoEjercicio->id_tipo_ejercicio = 1;
        $EntrenadorTipoEjercicio->save();

        // $EntrenadorTipoEjercicio = new EntrenadorTipoEjercicio();
        // $EntrenadorTipoEjercicio->id_entrenador = 1;
        // $EntrenadorTipoEjercicio->id_tipo_ejercicio = 3;
        // $EntrenadorTipoEjercicio->save();

        $EntrenadorTipoEjercicio = new EntrenadorTipoEjercicio();
        $EntrenadorTipoEjercicio->id_entrenador = 2;
        $EntrenadorTipoEjercicio->id_tipo_ejercicio = 2;
        $EntrenadorTipoEjercicio->save();

        // $EntrenadorTipoEjercicio = new EntrenadorTipoEjercicio();
        // $EntrenadorTipoEjercicio->id_entrenador = 2;
        // $EntrenadorTipoEjercicio->id_tipo_ejercicio = 4;
        // $EntrenadorTipoEjercicio->save();
    }
}
