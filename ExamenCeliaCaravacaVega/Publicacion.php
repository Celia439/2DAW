<?php

abstract class Publicacion implements IInformable
{
    public $titulo;
    public $autor;

    public function __construct($titulo, $autor)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    abstract function getResumen();
}