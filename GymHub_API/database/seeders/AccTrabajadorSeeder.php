<?php

namespace Database\Seeders;

use App\Models\AccesoTrabajador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccTrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_acceso')->insert([
            ['nivel_acceso' => 'A'], // admin
            ['nivel_acceso' => 'E'], // entrenador
            ['nivel_acceso' => 'R'], // recepcionista
        ]);
        
        //administrador
        $accesoTrabajador = new AccesoTrabajador();
        $accesoTrabajador->usuario = 'diegoH';
        $accesoTrabajador->password = Hash::make('d1234');
        $accesoTrabajador->id_trabajador = 1;
        $accesoTrabajador->id_tipo_acceso = 1;

        $accesoTrabajador->save();

        //entrenador
        $accesoTrabajador = new AccesoTrabajador();
        $accesoTrabajador->usuario = 'EdPerez';
        $accesoTrabajador->password = Hash::make('e1234');
        $accesoTrabajador->id_trabajador = 2;
        $accesoTrabajador->id_tipo_acceso = 2;

        $accesoTrabajador->save();

    }
}
