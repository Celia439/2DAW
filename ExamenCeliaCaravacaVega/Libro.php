<?php

class Libro extends Publicacion
{
    private $estado; //  valores: Disponible y Prestado

    public function __construct($titulo, $estado, $autor)
    {
        $this->estado = $estado;
        parent::__construct($titulo, $autor);
    }

    /*
     * Devuelve el titulo del libro en mayúsculas y el estado entre corchetes.
     */
    public function getResumen()
    {
        return "NUEVO LIBRO: " . $this->titulo . "[" . $this->estado . "]";
    }

    public function getEstilo()
    {
        if ($this->estado === 'Disponible') {
            $estilo = 'background-color: #d4edda; color: #155724;';
        } else {
            $estilo = 'background-color: #fff3cd; color: #856404;';
        }
    }
}
