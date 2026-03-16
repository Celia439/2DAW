<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    //
    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
