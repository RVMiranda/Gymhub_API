<?php

namespace Database\Seeders;

use App\Models\Clase;
use App\Models\Contrato;
use App\Models\Pago;
use App\Models\RegistroAsistencia;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            gymownderSeeder::class,
            TrabajadorSeeder::class,
            AccTrabajadorSeeder::class,
            TipoClienteSeeder::class,
            ClienteSeeder::class,
            ClienteTrabajadorSeeder::class,
            EntrenadorSeeder::class,
            EntrenadorClienteSeeder::class,
            EntrenadorAgendaSeeder::class,
            TiposEjercicioSeeder::class,
            ClaseSeeder::class,
            EntrenadorTipoEjercicioSeeder::class,
            ClasesConClientesSeeder::class,
            PagoSeeder::class,
            ContratoSeeder::class,
            RegistroAsistenciaSeeder::class,
            ClasesGrupalesSeeder::class,
            
        ]);

    }
}
