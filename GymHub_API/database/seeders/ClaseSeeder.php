<?php

namespace Database\Seeders;

use App\Models\Clase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Clases = new Clase();
        $Clases->clave = 'CARD01';
        $Clases->nombre = 'Clase de cardio en bicicleta';
        $Clases->descripcion = 'Cardio en bicicleta';
        $Clases->hora = '2024-11-28 11:00:00';
        $Clases->save();

        $Clases = new Clase();
        $Clases->clave = 'CFRZ01';
        $Clases->nombre = 'Clase de levantamiento de pesas';
        $Clases->descripcion = 'Sesiones intensivas de levantamiento de pesas';
        $Clases->hora = '2024-11-27 10:00:00';
        $Clases->save();
    }
}
