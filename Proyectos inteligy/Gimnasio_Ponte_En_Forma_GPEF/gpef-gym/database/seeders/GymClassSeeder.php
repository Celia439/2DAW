<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GymClass;
use App\Models\User;

class GymClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $entrenador = User::where('rol', 'entrenador')->first();

        GymClass::create([
            'nombre' => 'Yoga Principiantes',
            'descripcion' => 'Clase relajante para empezar el día.',
            'duracion' => 60,
            'capacidad' => 15,
            'imagen' => 'yoga.jpg',
            'entrenador_id' => $entrenador->id,
        ]);
    }
}
