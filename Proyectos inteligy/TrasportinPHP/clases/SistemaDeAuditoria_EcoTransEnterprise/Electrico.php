<?php

class Electrico extends Vehiculo
{
    public function obtenerEtiqueta()
    {
        return "Certificación: Etiqueta 0 Emisiones - Exento de restricciones.";
    }

    public function calcularAutonomia()
    {
        return "400 (km)";
    }

    function __toString()
    {
        $datos = "Categoría: <b>Eléctrico</b><br>";
        $datos .= parent:: __toString();
        $datos .= "<li>Autonomía: " . $this->calcularAutonomia() . "</li><li>" . $this->obtenerEtiqueta() . "</li></ul></ul>";
        return $datos;

    }
}