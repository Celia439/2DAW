<?php

class Delfin extends Animal
{
    public $longitud;

    /**
     * @param $longitud
     */
    public function __construct($nombre, $color, $fN, $longitud)
    {
        parent::__construct($nombre, $color, $fN);
        $this->longitud = $longitud;
    }
    public function __toString()
    {
        $salida=parent:: __toString();
        $salida.="<br>Longitud:$this->longitud<br>
     ";
        return $salida;
    }
    public function saltar()
    {
        echo "$this->nombre esta saltando por los aires";
    }
    public function comer()
    {
        echo "$this->nombre tiene hambre";
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
    public  function __get($propiedad)
    {
        return $this->$propiedad;
    }
}