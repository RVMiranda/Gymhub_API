<?php

namespace Database\Seeders;

use App\Models\Trabajador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //sera de administrador
        $trabajador = new Trabajador();
        $trabajador->nombre = 'Diego';
        $trabajador->apellido_p = 'Hernandez';
        $trabajador->apellido_m = 'Castelazzo';
        $trabajador->ine = '123456789';
        $trabajador->telefono = '9994567890';
        $trabajador->correo_e = 'diego@example.com';
        do {
            $initials = strtoupper(substr($trabajador->nombre, 0, 2) . substr($trabajador->apellido_p, 0, 1) . substr($trabajador->apellido_m, 0, 1));
            $randomNumber = mt_rand(10000, 99999);
            $matricula = $initials . $randomNumber;
        } while (Trabajador::where('matricula', $matricula)->exists());
        $trabajador->matricula = $matricula;
        $trabajador->activo = true;
        $trabajador->fecha_contratacion = now();

        $trabajador->save();

        //sera de entrenador
        $trabajador = new Trabajador();
        $trabajador->nombre = 'Eduardo';
        $trabajador->apellido_p = 'Perez';
        $trabajador->apellido_m = 'Cordoba';
        $trabajador->ine = '1234569';
        $trabajador->telefono = '999456789';
        $trabajador->correo_e = 'EdPer@example.com';
        do {
            $initials = strtoupper(substr($trabajador->nombre, 0, 2) . substr($trabajador->apellido_p, 0, 1) . substr($trabajador->apellido_m, 0, 1));
            $randomNumber = mt_rand(10000, 99999);
            $matricula = $initials . $randomNumber;
        } while (Trabajador::where('matricula', $matricula)->exists());
        $trabajador->matricula = $matricula;
        $trabajador->activo = true;
        $trabajador->fecha_contratacion = now();

        $trabajador->save();

        
    }
}
