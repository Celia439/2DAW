<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Crear un Admin
        User::create([
            'nombre' => 'Admin GPEF',
            'email' => 'admin@gpef.com',
            'password' => Hash::make('123456'),
            'telefono' => '600000001',
            'rol' => 'admin',
        ]);

        // Crear un Entrenador
        User::create([
            'nombre' => 'Entrenador Juan',
            'email' => 'juan@gpef.com',
            'password' => Hash::make('123456'),
            'telefono' => '600000002',
            'rol' => 'entrenador',
        ]);
    }
}
