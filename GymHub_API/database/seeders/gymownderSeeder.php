<?php

namespace Database\Seeders;

use App\Models\GymOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class gymownderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $gym_owner = new GymOwner();
        $gym_owner->client_name = 'Roberto';
        $gym_owner->client_lastname = 'Gonzalez';
        $gym_owner->gym_name = 'EVC Calistenia';
        do {
           
            $initials = strtoupper(substr($gym_owner->client_name, 0, 1) . substr($gym_owner->client_lastname, 0, 1));
            $randomNumber = mt_rand(1000, 9999);
            $client_id = $initials . $randomNumber;
        
           
        } while (GymOwner::where('client_id', $client_id)->exists());
        $gym_owner->client_id = $client_id;
        $gym_owner->email = 'EVCCalis@gmail.com';
        $gym_owner->password = Hash::make('12345');
        
        $gym_owner->save();

        $gym_owner = new GymOwner();
        $gym_owner->client_name = 'Lester';
        $gym_owner->client_lastname = 'Estrada';
        $gym_owner->gym_name = 'Power Gym';
        do {
           
            $initials = strtoupper(substr($gym_owner->client_name, 0, 1) . substr($gym_owner->client_lastname, 0, 1));
            $randomNumber = mt_rand(1000, 9999);
            $client_id = $initials . $randomNumber;
        
           
        } while (GymOwner::where('client_id', $client_id)->exists());
        $gym_owner->client_id = $client_id;
        $gym_owner->email = 'PowerG@gmail.com';
        $gym_owner->password = Hash::make('texas12');
        $gym_owner->save(); 
    }
}
