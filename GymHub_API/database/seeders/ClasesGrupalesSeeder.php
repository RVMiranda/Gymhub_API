<?php

namespace Database\Seeders;

use App\Models\ClasesGrupales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasesGrupalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ClasesGrupales = new ClasesGrupales();
        $ClasesGrupales->id_entrenador = 1;
        $ClasesGrupales->id_clase = 1;
        $ClasesGrupales->dia = 'Lunes';
        $ClasesGrupales->save();

        $ClasesGrupales = new ClasesGrupales();
        $ClasesGrupales->id_entrenador = 2;
        $ClasesGrupales->id_clase = 2;
        $ClasesGrupales->dia = 'Martes';
        $ClasesGrupales->save();

        $ClasesGrupales = new ClasesGrupales();
        $ClasesGrupales->id_entrenador = 2;
        $ClasesGrupales->id_clase = 2;
        $ClasesGrupales->dia = 'Miercoles';
        $ClasesGrupales->save();

        $ClasesGrupales = new ClasesGrupales();
        $ClasesGrupales->id_entrenador = 2;
        $ClasesGrupales->id_clase = 2;
        $ClasesGrupales->dia = 'Jueves';
        $ClasesGrupales->save();

        $ClasesGrupales = new ClasesGrupales();
        $ClasesGrupales->id_entrenador = 1;
        $ClasesGrupales->id_clase = 1;
        $ClasesGrupales->dia = 'Viernes';
        $ClasesGrupales->save();
    }
}
