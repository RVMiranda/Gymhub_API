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
        $AccesoTrabajador = new AccesoTrabajador();
        $AccesoTrabajador->usuario = 'diegoH';
        $AccesoTrabajador->password = Hash::make('d1234');
        $AccesoTrabajador->id_trabajador = 1;
        $AccesoTrabajador->id_tipo_acceso = 1;

        $AccesoTrabajador->save();

        //entrenador
        $AccesoTrabajador = new AccesoTrabajador();
        $AccesoTrabajador->usuario = 'EdPerez';
        $AccesoTrabajador->password = Hash::make('e1234');
        $AccesoTrabajador->id_trabajador = 2;
        $AccesoTrabajador->id_tipo_acceso = 2;

        $AccesoTrabajador->save();

        $AccesoTrabajador = new AccesoTrabajador();
        $AccesoTrabajador->usuario = 'Renzinho';
        $AccesoTrabajador->password = Hash::make('r1234');
        $AccesoTrabajador->id_trabajador = 3;
        $AccesoTrabajador->id_tipo_acceso = 2;

        $AccesoTrabajador->save();

    }
}
