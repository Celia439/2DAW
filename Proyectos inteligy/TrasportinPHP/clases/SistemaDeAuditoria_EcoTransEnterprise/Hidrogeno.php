<?php

class Hidrogeno extends Vehiculo
{
    function obtenerEtiqueta()
    {
        return "Etiqueta ECO - Acceso permitido acentro ciudad";
    }


    public function calcularAutonomia()
    {
        return "650 (km)";
    }

    function __toString()
    {
        $datos = "Categoría: <b>Hidrógeno</b><br>";
        $datos .= parent:: __toString();
        $datos .= "<li>Autonomía: " . $this->calcularAutonomia() . "</li><li>" . $this->obtenerEtiqueta() . "</li></ul></ul>";
        return $datos;

    }
}