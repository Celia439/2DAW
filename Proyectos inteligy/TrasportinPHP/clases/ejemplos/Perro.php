<?php

class Perro extends Animal
{
    public $raza;
    public $sexo;

    public function __construct($nombre, $color, $fN, $raza, $sexo)
    {
        parent::__construct($nombre, $color, $fN);
        $this->raza = $raza;
        $this->sexo = $sexo;
    }

    public function ladrar()
    {
        echo "$this->nombre dice guau";
    }

    public function mimir()
    {
        echo "$this->nombre se ha dormido ";
    }

 public function __toString()
 {
     $salida=parent:: __toString();
     $salida.="<br>Raza:$this->raza<br>
Sexto: $this->sexo<br>
     ";
     return $salida;
 }
public
function __set($propiedad, $valor)
{
    $this->$propiedad = $valor;
}

public
function __get($propiedad)
{
    return $this->$propiedad;
}
}
?>