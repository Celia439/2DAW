<?php

namespace App\Http\Controllers;

class UsuarioController extends Controller
{
    public function cuenta()
    {
        return view('usuario.cuenta');
    }

    public function favoritos()
    {
        return view('usuario.favoritos');
    }
}
