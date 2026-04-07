<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymClass extends Model
{
    // Le decimos que este modelo maneja la tabla 'classes'
    protected $table = 'classes';

    // Lista de campos que permitimos rellenar
    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion',
        'capacidad',
        'imagen',
        'entrenador_id'
    ];

    // Una clase pertenece a un entrenador (que es un usuario)
    public function entrenador()
    {
        return $this->belongsTo(User::class, 'entrenador_id');
    }

    // Una clase tiene muchos horarios
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'class_id');
    }
}
