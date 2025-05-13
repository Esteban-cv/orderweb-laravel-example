<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Technician;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(CausalSeeder::class);
        $this->call(ObservationSeeder::class);
        $this->call(TypeActivitySeeder::class);

        //create 1 user rol admin
        User::factory()->create([
            'role_id' => 1
        ]);

        //create 3 users rol super
        User::factory(3)->create([
            'role_id' => 2
        ]);

        //technicians
        Technician::factory(2)->create([
            'speciality' => 'Instalación de redes'
        ]);
        Technician::factory(2)->create([
            'speciality' => 'Construcción'
        ]);
        Technician::factory(1)->create([
            'speciality' => 'Lectura de redes'
        ]);
        Technician::factory(1)->create(); // técnico sin especialidad

        $this->call(ActivitySeeder::class);
    }
}
