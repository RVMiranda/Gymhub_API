<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // primer cliente basico
        $cliente = new Cliente();
        $cliente->nombre = 'Sebastián';
        $cliente->apellido_p = 'Arguello';
        $cliente->apellido_m = 'Ovando';
        $cliente->ine = 'AROV123456789';
        $cliente->correo_e = 'sebash5@gmail.com';
        $cliente->telefono = '9615551234';
        do {
            $initials = strtoupper(substr($cliente->nombre, 0, 1) . substr($cliente->apellido_p, 0, 1));
            $randomNumber = mt_rand(1000, 9999);
            $matricula = $initials . $randomNumber;
        } while (Cliente::where('matricula', $matricula)->exists());
        $cliente->matricula = $matricula;
        $cliente->id_tipo_cliente = 1;
        $cliente->save();

        // primer cliente VIP
        $cliente = new Cliente();
        $cliente->nombre = 'Ingrid';
        $cliente->apellido_p = 'Mendoza';
        $cliente->apellido_m = 'Diaz';
        $cliente->ine = 'MEDI123456';
        $cliente->correo_e = 'inmediz@gmail.com';
        $cliente->telefono = '995555678';
        do {
            $initials = strtoupper(substr($cliente->nombre, 0, 1) . substr($cliente->apellido_p, 0, 1));
            $randomNumber = mt_rand(1000, 9999);
            $matricula = $initials . $randomNumber;
        } while (Cliente::where('matricula', $matricula)->exists());
        $cliente->matricula = $matricula;
        $cliente->id_tipo_cliente = 2;
        $cliente->save();

        // segundo cliente VIP
        $cliente = new Cliente();
        $cliente->nombre = 'Daniel';
        $cliente->apellido_p = 'Dzul';
        $cliente->apellido_m = 'Solis';
        $cliente->ine = 'DZSO123456';
        $cliente->correo_e = 'dzul2@gmail.com';
        $cliente->telefono = '995554678';
        do {
            $initials = strtoupper(substr($cliente->nombre, 0, 1) . substr($cliente->apellido_p, 0, 1));
            $randomNumber = mt_rand(1000, 9999);
            $matricula = $initials . $randomNumber;
        } while (Cliente::where('matricula', $matricula)->exists());
        $cliente->matricula = $matricula;
        $cliente->id_tipo_cliente = 2;
        $cliente->save();
    }
}
