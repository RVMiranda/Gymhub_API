<?php

namespace Database\Seeders;

use App\Models\TiposEjercicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposEjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $TiposEjercicio = new TiposEjercicio();
        $TiposEjercicio->nombre = 'Peso';
        $TiposEjercicio->descripcion = 'Ejercicios de peso';
        $TiposEjercicio->save();

        $TiposEjercicio = new TiposEjercicio();
        $TiposEjercicio->nombre = 'Cardio';
        $TiposEjercicio->descripcion = 'Ejercicios enfocados en el cardio';
        $TiposEjercicio->save();

        $TiposEjercicio = new TiposEjercicio();
        $TiposEjercicio->nombre = 'Calistenia';
        $TiposEjercicio->descripcion = 'Ejercicios enfocados en la calistenia';
        $TiposEjercicio->save();

        $TiposEjercicio = new TiposEjercicio();
        $TiposEjercicio->nombre = 'Spinning';
        $TiposEjercicio->descripcion = 'Ejercicios enfocados en el spinning';
        $TiposEjercicio->save();
    }
}
