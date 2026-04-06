<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    // Le decimos que este modelo maneja la tabla 'Schedule'
    protected $table = 'schedules';
    // Lista de campos que permitimos rellenar
    protected $fillable = [
        'class_id',
        'fecha',
        'hora_inicio',
        'hora_fin'
    ];

    // Un horario pertenece a una clase
    public function gymClass()
    {
        return $this->belongsTo(GymClass::class, 'class_id');
    }

// Un horario tiene muchas reservas (mucha gente se apunta a las 10:00)
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
