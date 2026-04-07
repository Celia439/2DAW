<?php

namespace App\Http\Controllers;

class LibroController extends Controller
{
    public function show($id)
    {
        return view('libro.show', ['id' => $id]);
    }
}
