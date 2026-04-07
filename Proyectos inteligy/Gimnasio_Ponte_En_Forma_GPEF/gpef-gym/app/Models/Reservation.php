<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // Le decimos que este modelo maneja la tabla 'reservations'
    protected $table = 'reservations';

    // Lista de campos que permitimos rellenar
    protected $fillable = [
        'user_id',
        'schedule_id',
        'estado'
    ];

    // La reserva pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

// La reserva pertenece a un horario concreto
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
